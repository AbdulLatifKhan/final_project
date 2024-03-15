<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Category</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
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

                                <label class="form-label">Job Category</label>
                                <select type="text" class="form-select" id="jobCategory">
                                    
                                </select> 

                                <label class="form-label">Job Skill</label>
                                <select type="text" class="form-select" id="jobSkill">
                                    
                                </select>

                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>


jobCategoryList();

async function jobCategoryList() {
    try {
        showLoader();
        let res = await axios.get("/job-category-list");
        hideLoader();

        let selectElement = document.getElementById('jobCategory');
        selectElement.innerHTML = ''; 

        res.data['data'].forEach(function (item, index) {
            let option = document.createElement('option');
            option.value = item['id'];
            option.textContent = item['categoryName'];
            selectElement.appendChild(option);
        });
    } catch (e) {
        unauthorized(e.response.status);
    }
} 

jobSkillList();

async function jobSkillList() {
    try {
        showLoader();
        let res = await axios.get("/job-skill-list");
        hideLoader();

        let selectElement = document.getElementById('jobSkill');
        selectElement.innerHTML = ''; 

        res.data['data'].forEach(function (item, index) {
            let option = document.createElement('option');
            option.value = item['id'];
            option.textContent = item['skillName'];
            selectElement.appendChild(option);
        });
    } catch (e) {
        unauthorized(e.response.status);
    }
} 

async function Save(){
    let title = document.getElementById('title').value;
    let description = document.getElementById('description').value;
    let benefit = document.getElementById('benefit').value;
    let location = document.getElementById('location').value;
    let deadline = document.getElementById('deadline').value;
    let jobCategory = document.getElementById('jobCategory').value;
    let jobSkill = document.getElementById('jobSkill').value;

    if (title.length===0) {
        errorToast('Title Name is Required');
    } 
    if (description.length===0) {
        errorToast('Description is Required');
    } 
    if (benefit.length===0) {
        errorToast('Benefit Name is Required');
    } 
    if (location.length===0) {
        errorToast('Location is Required');
    } 
    if (deadline.length===0) {
        errorToast('Deadline Name is Required');
    } 
    if (jobCategory.length===0) {
        errorToast('Job Category is Required');
    } 
    if (jobSkill.length===0) {
        errorToast('JobSkill is Required');
    } 

    document.getElementById('modal-close').click();
    showLoader();
    let res = await axios.post("/employer-post-create", {
        title: title,
        description: description,
        benefit: benefit,
        location: location,
        deadline: deadline,
        jobCategory: jobCategory,
        jobSkill: jobSkill
    });
    hideLoader();
    if (res.status ===201) {
        successToast("Job Posted Successfully");

        document.getElementById('save-form').reset();
        await employerJobList();

    }
    
}

</script>
