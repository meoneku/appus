<div class="col-xxl-12 col-md-12">
    <div class="card info-card sales-card">
      <div class="card-body">
        <h5 class="card-title">Data Lengkap Keanggotaan Perpustakaan</h5>

        <div class="d-flex align-items-center">
          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center ms-3">
            <img src="{{ url('uploads').'/'.$member->photo }}" alt="Foto" width="128px" height="128px">
          </div>
          <div class="ps-5">
            <table class="table table-sm">
              <tbody>
                <tr>
                  <td>Nama Lengkap</td>
                  <td>:</td>
                  <td>{{ $member->member_name }}</td>
                </tr>
                <tr>
                  <td>NIM</td>
                  <td>:</td>
                  <td>{{ $member->member_number }}</td>
                </tr>
                <tr>
                  <td>Jurusan</td>
                  <td>:</td>
                  <td>{{ $member->major->major }}</td>
                </tr>
                <tr>
                  <td>Angkatan</td>
                  <td>:</td>
                  <td>{{ $member->year }}</td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td>:</td>
                  <td>{{ $member->gender }}</td>
                </tr>
                <tr>
                  <td>Nomor Handphone</td>
                  <td>:</td>
                  <td>{{ $member->phonenumber }}</td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td>{{ $member->addres }}</td>
                </tr>
                <tr>
                  <td>Keterangan</td>
                  <td>:</td>
                  <td>{{ $member->desc }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>