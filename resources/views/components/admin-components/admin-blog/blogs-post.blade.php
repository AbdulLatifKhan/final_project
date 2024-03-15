<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">

                            <h4>Blog Posts</h4>
                    
                    <hr/>
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class=" btn m-0 bg-gradient-primary mb-5">Create Post</button>
                    <div class="container-fluid m-0 p-0">

                        <table class="table" id="tableData">
                            <thead>
                            <tr class="bg-light">
                                <th>S.No</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="tableList">
            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
blogPostList();

async function blogPostList() {

   try { 
        showLoader();
        let res=await axios.get("/admin-blog-post-list");
        hideLoader();

        let tableList=$("#tableList");
        let tableData=$("#tableData");

        tableData.DataTable().destroy();
        tableList.empty();

        res.data['data'].forEach(function (item,index) {
            let row=`<tr>
                    <td>${index+1}</td>
                    <td>${item['title']}</td>
                    <td>${item['status']}</td>
                    <td>
                        <button data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                        <button data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                    </td>
                 </tr>`
            tableList.append(row)
        })


        $('.editBtn').on('click', async function () {
            let id= $(this).data('id');
            $("#update-modal").modal('show');
            $("#postID").val(id);
        })

        $('.deleteBtn').on('click',function () {
            let id= $(this).data('id');
            $("#delete-modal").modal('show');
            $("#deleteID").val(id);
        })

        new DataTable('#tableData',{
            //order:[[0,'desc']],
            lengthMenu:[5,10,15,20,30]
        });
    }catch (e) {
        unauthorized(e.response.status)
    } 

}


</script>
