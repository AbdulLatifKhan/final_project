<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Post</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Post Title *</label>
                                <input type="text" class="form-control" id="title">
                                <label class="form-label">Post Description *</label>
                                <textarea class="form-control" rows="5" id="description" name="text"></textarea>
                                <label class="form-label">Status</label>
                                <select class="form-select" id="status">
                                    <option>Draft</option>
                                    <option>Published</option>
                                  </select> 
                                <label class="form-label">Featured Image *</label>
                                <input type="file" class="form-control" id="featured_image">
                                <label class="form-label">Category Id *</label>
                                <select class="form-select" id="blog_category_id">

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
//    CategoryList();

// async function CategoryList() {
//     try {
//         showLoader();
//         let res = await axios.get("/admin-blogs-categoryList");
//         hideLoader();

//         let selectElement = document.getElementById('blog_category_id');
//         selectElement.innerHTML = ''; 

//         res.data['data'].forEach(function (item, index) {
//             let option = document.createElement('option');
//             option.value = item['id'];
//             option.textContent = item['name'];
//             selectElement.appendChild(option);
//         });
//     } catch (e) {
//         unauthorized(e.response.status);
//     }
// }           

  

// async function Save() {
//     // Get form input values
//     const title = document.getElementById('title').value;
//     const description = document.getElementById('description').value;
//     const status = document.getElementById('status').value;
//     const featured_image = document.getElementById('featured_image').files[0];
//     const blog_category_id = document.getElementById('blog_category_id').value;

   

//     // Create FormData object to send file along with other data
//     const formData = new FormData();
//     formData.append('title', title);
//     formData.append('description', description);
//     formData.append('status', status);
//     formData.append('featured_image', featured_image);
//     formData.append('blog_category_id', blog_category_id);

//     document.getElementById('modal-close').click();
//     showLoader();
//     let res=await axios.post('/admin-blog-post-create', formData, {
//         headers: {
//             'Content-Type': 'multipart/form-data' // Set content type to multipart/form-data for file uploads
//         }
//     });
//     hideLoader();
//     if (res.status ===201) {
//                 successToast(res.data['data']);

//                 document.getElementById('save-form').reset();
//                 await blogPostList();
//     }
// }

</script>
