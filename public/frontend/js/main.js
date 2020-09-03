  function getDistrict(province_id) {
         $.post("/ajax/get_json.php?action=province&action_type=district-list&province=" + province_id, function(data) {
             var $district_list = JSON.parse(data);
             var html = '<select name="user_info[district]" id="ship_to_district"><option value="0">--Chá»n Quáº­n/Huyá»‡n--</option>';
             $.each($district_list, function(key, item) {
                 html += '<option value=' + item.id + '>' + item.name + '</option>';
             });
             html += '</select>';

             $('#district-holder-login').html(html);
         });
     }
           