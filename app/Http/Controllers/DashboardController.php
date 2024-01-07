<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Pagination\LengthAwarePaginator;
    use Illuminate\Support\Facades\Session;


    use App\Models\DataFeed;
    use Carbon\Carbon;
    use App\Models\Users;
    use App\Models\Sensor;
    use App\Models\Lahan;
    use App\Models\User;


    class DashboardController extends Controller
    {

        /**
         * Displays the dashboard screen
         *
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
         */

        //DASHBOARD// 
        public function index()
        {
            $dataFeed = new DataFeed();
            $batas = 15;
            $users = User::with(['lahan.sensor'])
            ->orderBy('id', 'desc')
            ->paginate($batas);

            $lahan= Lahan::orderBy('id_lahan', 'desc')->paginate($batas);
            $sensor = Sensor::orderBy('id_sensor', 'desc')->paginate($batas);
            $jumlah_users = User::count();
            $jumlah_sensor = Sensor::count();
            
            $jumlah_lahan = Lahan::count();
            $no=$batas*($users->currentPage() - 1);


            return view('pages/dashboard/dashboard', compact('dataFeed','users', 'sensor','lahan','jumlah_users', 'jumlah_lahan', 'jumlah_sensor'));
        }




        //DAFTAR TABLE
        public function daftar_lahan()
        {
            $dataFeed = new DataFeed();
            $batas = 15;
            $lahan= Lahan::orderByRaw("LENGTH(id_lahan),  id_lahan")->paginate($batas);
            $currentPage = $lahan->currentPage();
            $lastPage = $lahan->lastPage();
            $pageRange = [];
            $pageRange[] = 1; 
            for ($i = max(2, $currentPage - 2); $i <= min($currentPage + 2, $lastPage - 1); $i++) {
                $pageRange[] = $i;
            }
        
            $pageRange[] = $lastPage;
            $customPaginator = new LengthAwarePaginator(
                $lahan->items(),
                $lahan->total(),
                $lahan->perPage(),
                $currentPage,
                ['path' => LengthAwarePaginator::resolveCurrentPath()]
            );            
            return view('pages/add/daftar-lahan', compact('dataFeed','lahan','customPaginator'));
        }
       
        public function daftar_farmer()
        {
            $dataFeed = new DataFeed();
            $batas = 15;
            $users = User::with(['lahan.sensor'])
            ->orderBy('id', 'desc')
            ->paginate($batas);
            $no=$batas*($users->currentPage() - 1);

            return view('pages/add/daftar-farmer', compact('dataFeed', 'users'));
        }

        public function daftar_sensor()
        {
            $dataFeed = new DataFeed();
            $batas = 15;
        
            $sensor = Sensor::orderByRaw("LENGTH(id_sensor), id_sensor")
                ->paginate($batas);
            $currentPage = $sensor->currentPage();
            $lastPage = $sensor->lastPage();
            $pageRange = [];
            $pageRange[] = 1; 
            for ($i = max(2, $currentPage - 2); $i <= min($currentPage + 2, $lastPage - 1); $i++) {
                $pageRange[] = $i;
            }
        
            $pageRange[] = $lastPage;
            $customPaginator = new LengthAwarePaginator(
                $sensor->items(),
                $sensor->total(),
                $sensor->perPage(),
                $currentPage,
                ['path' => LengthAwarePaginator::resolveCurrentPath()]
            );
        
            return view('pages/add/daftar-sensor', compact('dataFeed', 'customPaginator','sensor'));
        }




        //SEARCH//
        public function search_farmer(Request $request) {
            $batas = 5;
            $search = $request->search;
            $users = User::where('id', 'like', "%$search%")
                            ->orWhere('name', 'like', "%$search%")
                            ->orWhere('email', 'like', "%$search%")
                            ->paginate($batas);
            $no = $batas * ($users->currentPage() - 1);
            return view('pages/search/search-farmer', compact('search', 'users', 'no'));
        }

        public function search_lahan(Request $request) {
            $batas = 5;
            $search = $request->search;
            $lahan = Lahan::where('id_lahan', 'like', "%$search%")
                          ->orWhere('id_user', 'like', "%$search%")
                          ->paginate($batas);
            $no = $batas * ($lahan->currentPage() - 1);
            return view('pages/search/search-lahan', compact('search', 'lahan', 'no'));
        }

        public function search_sensor(Request $request) {
            $batas = 5;
            $search = $request->search;
            $sensor = Sensor::where('id_sensor', 'like', "%$search%")
                          ->orWhere('id_lahan', 'like', "%$search%")
                          ->paginate($batas);
        
            $no = $batas * ($sensor->currentPage() - 1);
            return view('pages/search/search-sensor', compact('search', 'sensor', 'no'));
        }


        //STORE//
        public function store_farmer(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
                'alamat_user' => 'required'
            ], [
                'name.required' => 'Nama wajib diisi!',
                'email.required' => 'Email wajib diisi!',
                'password.required' => 'Password wajib diisi!',
                'alamat_lahan.required' => 'Alamat lahan wajib diisi',
            ]);

            $batas = 15;
            $user= User::orderBy('id', 'desc')->paginate($batas);
            User::create([
                'name' =>$request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'alamat_user' => $request->alamat_user
                
            ]);


            return redirect('/pages/add/daftar-farmer')->with('tambah', 'Data berhasil ditambahkan');
        }

        public function store_lahan(Request $request)
        {
            $lastLahan = Lahan::orderBy('id_lahan', 'desc')->first();
            $nextNumber = ($lastLahan) ? intval(substr($lastLahan->id_lahan, 1)) + 1 : 1;
            $nextNumber = min($nextNumber, 1001);
            $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
            $newIdLahan = 'L' . $formattedNumber;
            $request->validate([
                'id_user' => 'required|exists:users,id',
                'alamat_lahan' => 'required',
                'luas_lahan' => 'required|numeric',
            ], [
                'id_user.exists' => 'ID User tidak tersedia dalam database.',
                'alamat_lahan.required' => 'Alamat lahan harus diisi.',
                'luas_lahan.required' => 'Luas lahan harus diisi.',
                'luas_lahan.numeric' => 'Luas lahan harus berupa nilai numerik.',
            ]);

            while (Lahan::where('id_lahan', $newIdLahan)->exists()) {
                $nextNumber++;
                $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
                $newIdLahan = 'L' . $formattedNumber;
            }

            Lahan::create([
                'id_lahan' => $newIdLahan,
                'id_user' => $request->id_user,
                'alamat_lahan' => $request->alamat_lahan,
                'luas_lahan' => $request->luas_lahan,
            ]);

            return redirect('/pages/add/daftar-lahan')->with('tambah', 'Data berhasil ditambahkan');
        }
        

        public function store_sensor(Request $request)
        {
            $request->validate([
                'id_lahan' => 'required',
                'tanggal_aktivasi' => 'required|date_format:Y-m-d H:i:s'
            ]);

            $lastSensor = Sensor::orderBy('id_sensor', 'desc')->first();
            $nextNumber = ($lastSensor) ? intval(substr($lastSensor->id_sensor, 1)) + 1 : 1;
            $formattedNumber = str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
            $newIdSensor = 'S' . $formattedNumber;
            Sensor::create([
                'id_sensor' => $newIdSensor,
                'id_lahan' => $request->id_lahan,
                'tanggal_aktivasi' => $request->tanggal_aktivasi
            ]);

            return redirect('/pages/add/daftar-sensor')->with('tambah', 'Data berhasil ditambahkan');
        }


        //EDIT//
        public function form_farmer_edit(string $id) {
            $users = User::find($id);
            $sensor = Lahan::with('sensor')->where('id_user', $id)->get();
            return view('pages.edit-delete.form-farmer', compact('users', 'sensor'));        
        }

        public function form_lahan_edit(string $id_lahan) {
            $lahan = Lahan::find($id_lahan);
            return view('pages.edit-delete.form-lahan', compact('lahan'));
        }
        public function form_sensor_edit(string $id_sensor) {
            $sensor = Sensor::find($id_sensor);
            return view('pages.edit-delete.form-sensor', compact('sensor'));
        }

        public function form_auth_edit(string $id) {
            $users = User::find($id);
            return view('pages.edit-delete.form-auth', compact('users'));        
        }

        public function read_farmer_edit($id) {
            $batas = 5;
            $users = User::find($id);
            $sensor = Lahan::with('sensor')->where('id_user', $id)->paginate($batas);
            $no=$batas*($sensor->currentPage() - 1);

            return view('pages.edit-delete.read-farmer', compact('users', 'sensor'));
        }

        
        public function read_lahan_edit(string $id_lahan) {
            $lahan = Lahan::find($id_lahan);

            return view('pages.edit-delete.read-lahan', compact('lahan'));
        }
        public function read_sensor_edit(string $id_sensor) {
            $sensor = Sensor::find($id_sensor);
            return view('pages.edit-delete.read-sensor', compact('sensor'));
        }

        public function read_auth_edit(string $id) {
            $users = User::find($id);
            return view('pages.edit-delete.read-auth', compact('users'));
        }


        //DESTROY//
        public function read_farmer_destroy($id){
            $users = User::find($id);
            $users->delete();
            return redirect('/pages/add/daftar-farmer')->with('delete', 'Sensor berhasil dihapus');
        }


        public function read_lahan_destroy($id_lahan){
            try {
                DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
                $lahan = Lahan::find($id_lahan);
                $lahan->delete();
        
                DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
                return redirect('/pages/add/daftar-lahan')->with('delete', 'Sensor berhasil dihapus');
            } catch (\Exception $e) {
                return redirect('/pages/add/daftar-lahan')->with('error', 'Terjadi kesalahan saat menghapus rekaman.');
            }
        }
        
        public function read_sensor_destroy($id_sensor){
            $sensor = Sensor::find($id_sensor);
            $sensor->delete();
            return redirect('/pages/add/daftar-sensor')->with('delete', 'Sensor berhasil dihapus');
        }

        public function form_farmer_update(Request $request, $id)
        {
            // Validasi form
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'required|min:8',
                'alamat_user' => 'required',
                'id' => 'required',
            ]);
        
            try {
                $user = User::findOrFail($id);
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->id = $request->input('id');
                $user->password = bcrypt($request->input('password'));
                $user->alamat_user = $request->input('alamat_user');
                $user->save();
        
                return redirect('/pages/add/daftar-farmer')->with('simpan', 'Farmer updated successfully');
            } catch (\Exception $e) {
                \Log::error('Error in form_farmer_update: ' . $e->getMessage());
        
                return back()->with('error', 'Error updating farmer');
            }
        }

        public function form_lahan_update(Request $request, $id_lahan)
        {
            $request->validate([
                'id_lahan' => 'required|string', 
                'id_user' => 'required|string', 
                'luas_lahan' => 'required|numeric',
                'alamat_lahan' => 'required|string',
            ]);

            $lahan = Lahan::find($id_lahan);
            $lahan->id_lahan = $request->input('id_lahan');
            $lahan->id_user = $request->input('id_user');
            $lahan->luas_lahan = $request->input('luas_lahan');
            $lahan->alamat_lahan = $request->input('alamat_lahan');
            $lahan->save();

            return redirect('/pages/add/daftar-lahan')->with('simpan', 'Lahan updated successfully');
        }

        public function form_sensor_update(Request $request, $id_sensor)
        {
            $request->validate([
                'id_sensor' => 'required|string',
                'id_lahan' => 'required|string',
                'tanggal_aktivasi' => 'required|string',
        ]);
            $sensor = Sensor::find($id_sensor);
            $sensor->id_sensor= $request->input('id_sensor');
            $sensor->id_lahan = $request->input('id_lahan');
            $sensor->tanggal_aktivasi = $request->input('tanggal_aktivasi');
            $sensor->save();
        return redirect('/pages/add/daftar-sensor')->with('simpan', 'Sensor updated successfully');
        }

}
