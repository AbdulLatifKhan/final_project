<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Companies</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row pt-3 pb-4">
                            <div class="col-md-9"></div>
                            <div class="col-md-3">
                                <select class="form-select form-select-md" id="sortByStatus" aria-label=".form-select-sm example">
                                    <option value="Active" selected>Active Companies</option>
                                    <option value="Pending">Pending Companies</option>
                                  </select>
                            </div>
                        </div>
                        <table class="table" id="tableData">
                            <thead>
                            <tr class="bg-light">
                                <th>S.No</th>
                                <th>Name</th>
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
employerList();

async function employerList() {

   try { 
        //let status = document.getElementById('sortByStatus').value;
        console.log(status)
        showLoader();
        let res=await axios.get("/admin-companies-list");
        hideLoader();

        let tableList=$("#tableList");
        let tableData=$("#tableData");

        tableData.DataTable().destroy();
        tableList.empty();

        res.data['data'].forEach(function (item,index) {
            let row=`<tr>
                    <td>${index+1}</td>
                    <td>${item['name']}</td>
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
            await FillUpUpdateForm(id)
            $("#update-modal").modal('show');
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
