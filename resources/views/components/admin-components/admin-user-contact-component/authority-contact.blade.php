<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Contact Page</h4>
                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <button onclick="Save()" class="btn btn-primary float-end">Save</button>
                        </div>

                        </div>
                    
                    </div>

                    <div class="container-fluid m-0 p-0">
                        <form id="save-form">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 p-2">
                                        <label class="form-label">Page Title </label>
                                        <input type="text" class="form-control" id="title">

                                        <label class="form-label">address</label>
                                        <input type="text" class="form-control" id="address">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" id="phoneNumber">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email">

                                        <div class="border border-secondary my-3" style="min-height: 200px;">
                                            <img id="img-preview" src="#" alt="Preview" class="" style=" display: none;">
                                        </div>
                                        <label for="bannerImg" class="custom-file-upload">
                                            <input type="file" name="bannerImg" id="bannerImg" class="inputfile" accept="image/*">
                                            Upload
                                        </label>


                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#bannerImg').change(function() {
            previewImage(this);
        });
    });
    
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
    
            reader.onload = function(e) {
                $('#img-preview').attr('src', e.target.result);
                $('#img-preview').show();
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }

    async function Save() {
    // Get form input values
    const title = document.getElementById('title').value;
    const address = document.getElementById('address').value;
    const phoneNumber = document.getElementById('phoneNumber').value;
    const bannerImg = document.getElementById('bannerImg').files[0];
    const email = document.getElementById('email').value;

   

    // Create FormData object to send file along with other data
    const formData = new FormData();
    formData.append('title', title);
    formData.append('address', address);
    formData.append('phoneNumber', phoneNumber);
    formData.append('bannerImg', bannerImg);
    formData.append('email', email);

 
    showLoader();
    let res=await axios.post('/contact-page-info-create', formData, {
        headers: {
            'Content-Type': 'multipart/form-data' // Set content type to multipart/form-data for file uploads
        }
    });
    hideLoader();
    if (res.status ===201) {
                successToast(res.data['data']);
    }
}

    </script>