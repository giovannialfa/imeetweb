<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" id="edit_form_id">
                <div class="modal-body form-modal" style="margin-top: auto;">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="fullname" style="display: flex;">Nama</label>
                        <input type="text" class="form-control" id="adminFullname1" name="adminFullname1" placeholder="Nama" value='' >
                    </div>
                    <div class="form-group">
                        <label for="adminId" style="display: flex;">AdminId</label>
                        <input type="number" class="form-control" id="adminId1" name="adminId1"  placeholder="AdminId" value=''>
                    </div>

                    <div class="form-group">
                        <label for="password" style="display: flex;">Password</label>
                        <input  type="password" class="form-control" id="adminPassword1" name="adminPassword1" type="password" placeholder="Password" value=''>
                    </div>

                    <div class="form-group" style="display: none;">
                        <label for="currentBuilding" style="display: flex;">Current Building</label>
                        <input class="form-control" id="currentBuilding" name="currentBuilding" type="password" placeholder="Password" value="{{Auth::user()->building}}">
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Edit</button>

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    console.log(fullname)
</script>