$(document).ready(function(){
    $("#check_domain").change(function(e){
        e.stopImmediatePropagation();
        var domain = $("#check_domain").val();
        var user_id = $(this).attr('data-key');
      
     

        $.ajax({
            url: 'index.php?view=select_domain_ajax',
            type: 'POST',
            data: {domain: domain, user_id:user_id  },
            dataType: "json",
            success: function(res){
                //var dbl = JSON.parse(res);
                var tr = '';
                res.unlisted.forEach(function(elem, i){
                   
                tr +=     ('<tr>' +
                    '<td>'+ elem[0] +'</td>'
                    +'<td>'+ elem[1] +'</td>'
                    +'<td>'+ res.listed[i][1] +'</td>'
                    +'</tr>');

                });

               $(".ajax_data_chart").html(tr);
                Highcharts.chart('container', {
                    data: {
                        table: 'datatable'
                    },
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Grafic DBL list daily'
                    },
                    yAxis: {
                        allowDecimals: false,
                        title: {
                            text: 'Units'
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    tooltip: {
                        formatter: function () {
                            return '<b>' + this.series.name + '</b><br/>' +
                                this.point.y;
                        }
                    },

                });
            }
        });
    });

    $("#databases_status_form").submit(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        $('.spam_result_row_fail').html('');
        $(".ajax_load").show();
        var c= 1;
        $('.switch_ajax').each(function(i, item){
            var rbl = $(this).attr('name');
            var status;
            var img;
            var domain = $(this).attr('data-key');
            var session_id = $("#ses_id").val();
            $.ajax({
                url: 'index.php?view=rblresult',
                type: 'POST',
                data: {domain: domain, rbl:rbl, session_id: session_id  },
                dataType: "json",
                success: function(res){
                   
                    if(res.res[res.rbl].status == 'listed'){
                         status = 'listed';
                        img = "../images/incorrect.png";
                    }else{
                        status = 'unlisted';
                        img = "../images/correct.png";
                    }
                    var html = "<div class='spam_result_row_fail'>" +
                                    "<div class='spam_result_icon'>" +
                                    "<img src='"+img+"'/>" +
                                    "</div>" +
                                    "<div class='spam_result_blacklist'>" +
                                            res.rbl +
                                     "</div>" +
                                    "<div class='spam_result_details'>" +
                                    res.res[res.rbl].status  +
                                    "</div>" +
                                    "<div class='spam_result_time'>"+
                                    res.res[res.rbl].time
                                           + "</div>"+
                               "</div>";
                        if(res.res[res.rbl].status == 'listed'){
                            $(".data_resp").append($(html));
                        }

                },
                complete: function () {
                    c++;
                    if (c === $('.switch_ajax').length){

                        $(".ajax_load").hide();
                    }
                }

            });
        });



    });

});