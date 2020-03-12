 // buscador

                    function search() {

                        const buscar = document.querySelector("#formulario");   
                        const pag = document.querySelector("#pag");        
                        
                            let text = buscar.value;
                            let pa = pag.value; 
                            
                            // console.log(text);
                            let parametro = {
                                "text" : text,
                                "pag"  : pa
                                
                            };

                            $.ajax({
                                data: parametro,
                                url:  "search.php",
                                type: "GET",
                                success: function (response) {
                                    $("#searching").html(response);
                                }
                            });

      
                        
                    }

//consultar datos 

 $(document).ready(function() {

    fetchCategory();
    listCategory();

    // new category
    $('#form_category').submit(function (e) {

      

        const postDate = {
            'newCategory':$('#newcategory').val()
        };

        $.post('save.php', postDate, function (response) {
            fetchCategory();
            listCategory();
            $("#info_category").html(`

            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>OK!</strong> nueva Categoria creada con exito... <i class="far fa-smile-beam"></i> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

            `);
           $('#form_category').trigger('reset'); 
        });
        
        e.preventDefault(); 
    });

    //category-list
   function fetchCategory(color) {
    $.ajax({
        url: 'category-list.php',
        type: 'GET',
        success: function (response) {
            let categorys = JSON.parse(response);
            let template = '';
            categorys.forEach(category => {
                template += `
                <tr categoryID="${category.id}">
                    <td>${category.code}</td>
                    <td>${category.category}</td>
                    
                    <td>
                    <button type="button" class="category-delete btn btn-danger"><i class="far fa-trash-alt"></i></buton>
                    </td>
                </tr>
                `
            });
            $('#categorys').html(template);
        }
    });
   }



   //delete Category
    $(document).on('click', '.category-delete', function (params) {
       let element = $(this)[0].parentElement.parentElement;
       let id = $(element).attr('categoryID');

        $.post('delete_category.php', {id}, function (response) {
             fetchCategory();
             listCategory();
             $('#category_delete').html(`
             
             <div class="alert alert-danger alert-dismissible fade show" role="alert">
             <strong>OK!</strong> categoria eliminada... <i class="far fa-smile-beam"></i> 
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
             </div>
             
             `); 
        });
        
    });

    //new Product

    $('#newProduct').submit(function (e) {
        //console.log('estoy en newproduct');
        const postDate = {
            'category':$('#category').val(),
            'name_product':$('#name_product').val(),
            'price_product':$('#price_product').val(),
            'quantity_product':$('#quantity_product').val()
        };

        // console.log(postDate);

        $.post('save.php', postDate, function (response){
            search();
            // console.log('producto almacenado con exito...');
            $("#info_save").html(`

            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>OK!</strong> nuevo producto agregado con exito... <i class="far fa-smile-beam"></i> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>

            `);
            $('#newProduct').trigger('reset'); 

        });
        e.preventDefault();

    });


    //category select
    function listCategory() {
        $.ajax({
            url: 'list-category.php',
            type: 'GET',
            success: function (response) {
                let categorys = JSON.parse(response);
                let template = '';
                template+=`<select name="category" id="category" class="form-control" required>
                <option value="">Sin Elementos...</option> 
                `;
                categorys.forEach(category => {
                    template += `
                    
                    <option value="${category.code}">${category.category}</option>                   
                    `
                });
                template +=`</select>`;
                 $('#options').html(template);
                // console.log(response);
            }
        });
       
   }

     //delete Product
     $(document).on('click', '.product-delete', function (params) {
        // console.log('estoy en eliminar producto');
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productid');
 
         $.post('delete.php', {id}, function (response) {
             search();
              $('#product_delete').html(`
              
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>OK!</strong> Producto eliminada... <i class="far fa-smile-beam"></i> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              
              `); 

            //   console.log(id);
         });

        //  console.log(element);
        
     });

   

 });



 



