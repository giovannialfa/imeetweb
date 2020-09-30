<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="post">
                @csrf  
                <div class="modal-body form-modal" style="margin-top: auto;">
                    <div class="form-group">
                        <label for="fullname" style="display: flex;">Nama</label>
                        <input class="form-control" id="adminFullname" name="adminFullname" type="text" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="adminId" style="display: flex;">AdminId</label>
                        <input class="form-control" id="adminId" name="adminId" type="number" placeholder="AdminId">
                    </div>

                    <div class="form-group">
                        <label for="password" style="display: flex;">Password</label>
                        <input class="form-control" id="adminPassword" name="adminPassword" type="password" placeholder="Password">
                    </div>

                    <div class="form-group" style="display: none;">
                        <label for="currentBuilding" style="display: flex;">Current Building</label>
                        <input class="form-control" id="currentBuilding" name="currentBuilding" type="password" placeholder="Password" value="{{Auth::user()->building}}">
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" onclick="createAdmin();">Tambah</button>

                </div>
            </form>
        </div>
    </div>
</div>