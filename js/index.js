
$(document).ready(function () {
    listStore();
    // console.log("jquery");
    //seleccione tienda
    $(document).on('click','#store',function () {
     console.log("te escucho stors");
    });
   

    // list- store
    function listStore() {
      
        $.ajax({
                url: 'php/list-store.php',
                type: 'GET',
                success: function (response) {
                    // console.log(response);
                    let store = JSON.parse(response);
                    let template = `
                    
                    <select id="stores" name="stores" class="form-control form-control-lg"  required>
                    <option value="">Seleccione Tienda...</option>`;
                     store.forEach(stores => {
                         template += `
                        
                         <option value="${stores.storeCode}">${stores.storeName}</option>
                         `;
                     });
                     template += `</select>`;
                     $('#stores').html(template);
                    // console.log(response);
                } 
            });

    }
   
    
});