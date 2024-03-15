<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="employerName" readonly>
                                <label class="form-label mt-2">Email</label>
                                <input type="text" class="form-control" id="employerEmail" readonly>
                                <label class="form-label mt-2">Status</label>
                                <select type="text" class="form-control form-select" id="employerStatus">
                                    <option value="Active">Active</option>
                                    <option value="Pending">Pending</option>
                                </select>
                                <input type="text" class="d-none" id="employerID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>

        </div>
    </div>
</div>

<script>

async function FillUpUpdateForm(id){
    try {
        document.getElementById('employerID').value=id;
        showLoader();
        let res=await axios.post("/admin-companies-ById",{id:id})
        hideLoader();
        document.getElementById('employerName').value=res.data['data']['name'];
        document.getElementById('employerEmail').value=res.data['data']['email'];
    }catch (e) {
        unauthorized(e.response.status)
    }
}


async function update() {

try {
    let employerStatus=document.getElementById('employerStatus').value;
    let employerID=document.getElementById('employerID').value;
    document.getElementById('update-modal-close').click();

    let PostBody= {
        "status":employerStatus,
        "id":employerID
    }

    showLoader();
    let res = await axios.post("/admin-companies-status-update",PostBody)
    hideLoader();
    if(res.data['msg']==="success"){
        successToast(res.data['data'])
       await employerList();
    }
    else{
        errorToast(res.data['data'])
    }

}catch (e) {
    unauthorized(e.response.status)
}

}


</script>

