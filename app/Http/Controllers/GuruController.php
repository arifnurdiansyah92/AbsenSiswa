<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;

class GuruController extends Controller
{
    public function index(){
        $resource = Guru::paginate(10);
        return view('admin/guru',['resource'=>$resource]);
    }
    public function create(Request $request){
        $check = Guru::where(['nip' => $request->nip])->get();
        if($check->count()>0){
            session()->flash('notif', array('success' => false, 'msgaction' => 'Tambah Data Gagal, Data Telah Ada!'));
            return redirect('/admin/guru');
        }
        else{
            $Guru = new Guru;
            $Guru->nip = $request->nip;
            $Guru->nama = $request->nama;
            $Guru->jenis_kelamin = $request->jk;
            $Guru->status = $request->status;
            if($Guru->save()){
                session()->flash('notif', array('success' => true, 'msgaction' => 'Tambah Data Berhasil!'));
            }
            else{
                session()->flash('notif', array('success' => false, 'msgaction' => 'Tambah Data Gagal, Silahkan Ulangi!'));
            }
            return redirect('/admin/guru');
        }

    }
    public function update(Request $request){
        $Guru = Guru::find($request->id_guru);
        $Guru->nip = $request->nip;
        $Guru->nama = $request->nama;
        $Guru->jenis_kelamin = $request->jk;
        $Guru->status = $request->status;
        if($Guru->save()){
            session()->flash('notif', array('success' => true, 'msgaction' => 'Edit Data Berhasil!'));
            return redirect('/admin/guru');
        }else{
            session()->flash('notif', array('success' => false, 'msgaction' => 'Edit Data Gagal, Silahkan Ulangi!'));
            return redirect('/admin/guru');
        }
    }
    public function delete($id){
        Guru::find($id)->delete();
        session()->flash('notif', array('success' => true, 'msgaction' => 'Hapus Data Berhasil!'));
        return redirect('/admin/guru');
    }
    public function show($id){
        $resource = Guru::find($id);
        return view('Admin/guru', ['resource'=>$resource]);
    }
    public function search(Request $request){
        $key = $request->key;
        if($key != ""){
            $resource = Guru::where('nip', 'like', '%' . $key . '%')
                ->orWhere('nama', 'like', '%' . $key . '%')
                ->paginate(10);
        }else{
            $resource = Guru::paginate(10);
        }
        if(count($resource)==0){
            echo "<td colspan='9' class='text-center'>Tidak ada data</td>";
        }
        $index = 1;
        foreach($resource as $res){
?>
<tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td class="text-center"><?php echo $index ?></td>
    <td><?php echo $res->nip ?></td>
    <td><?php echo $res->nama ?></td>
    <td class="text-center"><?php if($res->jenis_kelamin=="L"){echo 'Laki-Laki';}else{echo 'Perempuan';} ?></td>
    <td class="text-center"><?php echo $res->status ?></td>
    <td class="text-center"><p data-placement="top" data-toggle="tooltip" title="Edit"><button data-aksi="siswa" data-nama="<?php echo $res->nama ?>" data-id="<?php echo $res->id_siswa ?>" data-status="<?php echo $res->status ?>" data-jk="<?php echo $res->jenis_kelamin ?>" data-tk="<?php echo $res->tingkat_kelas ?>" data-nis="<?php echo $res->nis ?>" class="edit-button btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td class="text-center"><p data-placement="top" data-toggle="tooltip" title="Delete"><button data-aksi="siswa" data-id="<?php echo $res->id_siswa ?>" class="delete-button btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p></td>
</tr>
<?php
            $index++;
                                  }
    }
}
