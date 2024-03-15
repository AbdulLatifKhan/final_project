<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1><span id="title"></span></h1>

</div>
  

<div class="container py-5">
    <div class="row">
      <div class="col-md-6 ">
        <h3>Contact us</h3>
        <div class="me-5 pe-5">
          <div class="card bg-light">
            <div class="card-body ">
              <p class="fs-5">Address: <span id="contactAddress"></span> </p>
              <p class="fs-5">Phone: <span id="contactPhoneNumber"></span> </p>
              <p class="fs-5" >Email: <span id="contactEmail"></span> </p>
            </div>
          </div>
        </div>
        
      </div>
      <div class="col-md-6">
        <h3>Get in Touch</h3>
        <div class="me-5 pe-5">
          <div class="card bg-light">
            <div class="card-body">
              <form id="save-form">
                <div class="mb-3">
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Subject">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Phone Number">
                </div>
                <div class="mb-3">
                  <textarea class="form-control" rows="5" id="comment" name="text" placeholder="Write Message Here"></textarea>
                </div>
                <div class="mb-3">
                  <button onclick="onRegistration()" type="submit" class="btn btn-dark text-capitalize fs-6" style="float: right;">Send Message</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <div class="container-fluid  py-5" style="background: #f2f0f1;">
  <div class="row">
    <h3 class="text-center py-4">Companies believe in us</h3>
  </div>
  <div class="row py-4 text-center justify-content-center" style="background: #cac0c3;">
    
    <div class="col-2 mx-3">
      <div class="">
        <div class="card bg-light">
          <div class="card-body ">
            <p class="fs-5">Cefalo</p>
            <p class="fs-5">Since 3 Years</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-2">
      <div class="">
        <div class="card bg-light">
          <div class="card-body ">
            <p class="fs-5">Enosis Solutions</p>
            <p class="fs-5">Since 5 Years</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-2">
      <div class="">
        <div class="card bg-light">
          <div class="card-body ">
            <p class="fs-5">herap BD Ltd</p>
            <p class="fs-5">Since 7 Years</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-2">
      <div class="">
        <div class="card bg-light">
          <div class="card-body ">
            <p class="fs-5">SouthTech</p>
            <p class="fs-5">Since 4 Years</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-2">
      <div class="">
        <div class="card bg-light">
          <div class="card-body ">
            <p class="fs-5">Nascenia</p>
            <p class="fs-5">Since 5 Years</p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>



<script>
  contactInfo();

async function contactInfo() {
   
        showLoader();
        let res=await axios.get("/contact-page-info");
        hideLoader();
        console.log(res.data);
        if(res.status==200){
          document.getElementById("title").textContent = res.data.data['title'];
          document.getElementById("banner").src = res.data.data['bannerImg'];
          document.getElementById("contactAddress").textContent = res.data.data['address'];
          document.getElementById("contactPhoneNumber").textContent = res.data.data['phoneNumber'];
          document.getElementById("contactEmail").textContent = res.data.data['email'];

        }

}
</script>