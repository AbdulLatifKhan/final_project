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
                                <label class="form-label mt-2">Status</label>
                                <select class="form-select" aria-label="Default select example" id="statusID">
                                    <option value="Draft">Draft</option>
                                    <option value="Published">Published</option>
                                </select>
                                <!-- Hidden input field to store post ID -->
                                <input type="hidden" id="postID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="update()" id="update-btn" class="btn bg-gradient-success">Update</button>
            </div>
        </div>
    </div>
</div>


 <script>

async function update() {
    try {
        let statusID = document.getElementById('statusID').value;
        let postID = document.getElementById('postID').value;

        // Check if the status field is not empty
        if (!statusID.trim()) {
            // Display an error message or handle the case where the status field is empty
            return; // Exit the function early
        }

        document.getElementById('update-modal-close').click();
        console.log(statusID);
        let PostBody = {
            "status": statusID,
            "id": postID
        }

        showLoader();
        let res = await axios.post("/admin-blog-post-update", PostBody);
        hideLoader();

        if (res.data['msg'] === "success") {
            successToast(res.data['data']);
            await blogPostList();
        } else {
            errorToast(res.data['data']);
        }

    } catch (e) {
        unauthorized(e.response.status);
    }
}
</script> 

