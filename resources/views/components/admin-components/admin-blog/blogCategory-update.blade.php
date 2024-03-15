<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="catName">
                                <input type="text" class="d-none" id="catID">
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
async function FillUpUpdateForm(id) {
    try {
        document.getElementById('catID').value = id;
        showLoader();
        let res = await axios.get("/admin-blogs-category-by-id", {
            params: { id: id }  
        });
        hideLoader();
        console.log(res.data);
        document.getElementById('catName').value = res.data['data']['name'];
    } catch (e) {
        return e;
    }
}

async function update() {

    try {
        let catName=document.getElementById('catName').value;
        let catID=document.getElementById('catID').value;
        document.getElementById('update-modal-close').click();

        let PostBody= {
            "name":catName,
            "id":catID
        }

        showLoader();
        let res = await axios.post("/admin-blogs-update",PostBody)
        hideLoader();
        console.log(res.data);
        if(res.data['msg']==="success"){
            successToast(res.data['data'])
        await blogCategoryList();
        }
        else{
            errorToast(res.data['data'])
        }

    }catch (e) {
        unauthorized(e.response.status)
    }

}

</script>

