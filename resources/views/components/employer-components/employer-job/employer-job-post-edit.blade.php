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

                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" id="title">

                                <label class="form-label">description</label>
                                <textarea class="form-control" rows="10" id="description" name="text"></textarea>

                                <label class="form-label">benefit</label>
                                <textarea class="form-control" rows="5" id="benefit" name="text"></textarea>

                                <label class="form-label">location</label>
                                <input type="text" class="form-control" id="location">
                                <label class="form-label">deadline</label>
                                <input type="text" class="form-control" id="deadline">

                                <input type="text" class="d-none" id="jobPostID">
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
        document.getElementById('jobPostID').value = id;
        showLoader();
        let res = await axios.get("/employer-job-post-by-id", {
            params: { id: id }  
        });
        hideLoader();
        //console.log(res.data);

        document.getElementById('title').value = res.data['data']['title'];
        document.getElementById('description').value = res.data['data']['description'];
        document.getElementById('benefit').value = res.data['data']['benefit'];
        document.getElementById('location').value = res.data['data']['location'];
        document.getElementById('deadline').value = res.data['data']['deadline'];

    } catch (e) {
        return e;
    }
}

async function update() {

    try {
        let title=document.getElementById('title').value;
        let description=document.getElementById('description').value;
        let benefit=document.getElementById('benefit').value;
        let location=document.getElementById('location').value;
        let deadline=document.getElementById('deadline').value;
        let jobPostID=document.getElementById('jobPostID').value;


        document.getElementById('update-modal-close').click();

        let PostBody= {
            "title": title,
            "description": description,
            "benefit": benefit,
            "location": location,
            "deadline": deadline,
            "id": jobPostID
        }

        showLoader();
        let res = await axios.post("/employer-job-post-update",PostBody)
        hideLoader();
        //console.log(res.data);
        if(res.data['msg']==="success"){
            successToast(res.data['data'])
        await employerJobList();
        }
        else{
            errorToast(res.data['data'])
        }

    }catch (e) {
        unauthorized(e.response.status)
    }

}

</script>

