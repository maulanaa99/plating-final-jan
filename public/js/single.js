
$(document).ready(function(){
    var basePath = $("#base_path").val();
    //Array of Values
    $("#part_name").autocomplete({
        source: function(request, cb){
            $.ajax({
                url: basePath+'/get-employess/'+request.term,
                method: 'GET',
                dataType: 'json',
                success: function(res){
                    var result;
                    result = [
                        {
                            label: 'There is no matching record found for '+request.term,
                            value: ''
                        }
                    ];

                    console.log(res);
                    

                    if (res.length) {
                        result = $.map(res, function(obj){
                            return {
                                label: obj.part_name,
                                value: obj.part_name,
                                data : obj
                            };
                        });
                    }
                    cb(result);
                }
            });
        },
        select:function(e, selectedData) {
            console.log(selectedData);

            if (selectedData && selectedData.item && selectedData.item.data){
                var data = selectedData.item.data;
                
                $('#no_part').val(data.no_part);
                $('#katalis').val(data.katalis);
                $('#channel').val(data.channel);
                $('#grade_color').val(data.grade_color);
                $('#qty_bar').val(data.qty_bar);
            }
        }
    });
});



