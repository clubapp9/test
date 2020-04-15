
<!-- Pop Over Code for Managing Each Cell -->
<div class="container-fluid">
    <div class="container">
        <?php
        // if(! $this->request->is('ajax')){
        $order_id = $order->id;
        if(isset($order->order_info['custom_order_info'])) {
            $job_info = $order->order_info['custom_order_info'];
        }else
        {
            $job_info = array( 'job_name' => "no job name", 'job_info' => 'no job info' );
        }
        ?>

        <div class="row">

            <div class="col-8 offset-2" style="border: 1px #000;">
                <legend class="text-muted">View Proofs</legend>
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <!-- 14 columns -->
                        <th>Job Number</th>
                        <th>Job Name</th>
                        <th>Job Type</th>
                        <th>Company</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- 4 columns -->

                    <tr>
                        <td><?= $order_id;?> </td>

                        <td> <?php if(isset($job_info['job_name'])) echo $job_info['job_name'];?></td>

                        <td> <?php if(isset($job_info['job_type'])) echo $job_info['job_type'];?></td>

                        <td> <?=$company_name;?></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <?php //} ?>

            <div class="col-8 offset-2">
                <div class="row p-2">
                    <legend> <strong> Proofs Uploaded </strong></legend>
                    <?php
                    if($files->count() > 0 )
                    {?>

                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <!-- 14 columns -->
                            <th>Filename</th>
                            <th>Date Uploaded</th>
                            <th>Location</th>
                            <th>View Proof</th>
                            <th>Accept / Decline</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- 4 columns -->
                        <!--<a data-href="/files/delete/<?=$file->id?>" data-toggle="popover"
       data-content="<a href='#' onClick='popAccept(<?=$file->id?>);return false;'>Accept</a> | <a href='#' onClick='popDecline(<?=$file->id?>);return false;'>Decline</a>"
       data-placement="right"  data-id="<?=$file->id?>" data-option="ksdkjakdfk">Approve / Decline</a>-->

                        <?php foreach ($files as $file): ?>
                        <tr>
                            <?php
                            //var_dump($file);
                            ?>
                            <td><?=$file->name?></td>

                            <td><?=$file->created?></td>

                            <td><?=$file->type?></td>

                            <td><a href="<?=$file->path?><?=$file->name?>" target="_blank">View</a></td>

                            <td>
                                <?php
                                $approve_decline = '<div id="popover_container_'.$file->id.'"><a data-href="/files/updateFile/' . $file->id .'" data-toggle="popover"
                                                                                             data-content="<a href=\'#\' onClick=\'popApprove(' . $file->id .');return false;\'>Approve</a> | <a href=\'#\' onClick=\'popDecline('. $file->id .');return false;\'>Decline</a> | <a href=\'#\' onClick=\'cancelAcceptDecline('. $file->id .');return false;\'>Cancel</a>"
                                                                                             data-placement="right"  data-id="'.$file->id.'"><span id="approve_decline_span_'.$file->id.'">Approve / Decline</span></a></div>
                <div id="approve_decline_div_'.$file->id.'" style="display:none;">
                    <input type="hidden" id="approve_decline_status_'.$file->id.'"> <input type="hidden" id="approve_decline_hidden_'.$file->id.'"><textarea rows="5" class="col-12" id="approve_decline_note_'.$file->id.'" placeholder="Add any notes or comments about the proof"></textarea> <button class="col-12 btn-info" id="button_approve_decline_'.$file->id.'" onClick="AcceptDeclineSubmit('.$file->id.');">Submit</button></div>';
                                if($ISADMIN){
                                echo '<strong class="'.$file->status.'" id="approve_decline_current">Status:' . $file->status . '</strong><br/>';
                                echo $approve_decline;
                                ?>
                                <?php
                                }else if($file->status == 'none'){
                                echo $approve_decline;
                                }else{
                                echo '<strong> ' . $file->status . '</strong>';
                                }
                                ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br><br>
                    <script type="text/javascript">
                        function AcceptDeclineSubmit(id)
                        {
                            $('#button_approve_decline_'+id).hide();
                            var url = $('#approve_decline_hidden_'+id).val();
                            var approve_decline_note = $('#approve_decline_note_'+id).val();
                            var approve_decline_status = $('#approve_decline_status_'+id).val();
                            var data =  { approve_decline_note:approve_decline_note, status: approve_decline_status  };
                            try {
                                //promise to update status
                                var csrf_token = $('#csrfToken').val();
                                const headers = new Headers({
                                    'Content-Type': 'application/json',
                                    'X-CSRF-Token': csrf_token
                                });
                                fetch(url, {
                                    method: 'POST',
                                    headers: headers,
                                    body: JSON.stringify(data)
                                }).then((res) => res.json())
                            .then(function(response){
                                    resetMsgs();
                                    if($.isEmptyObject(response.error)){
                                        printMsg(response, 'success');
                                        $('#viewProofModal').animate({ scrollTop: 0 }, 'slow');
                                        $('#popover_container_'+id).html('<strong>' + $('#approve_decline_status_'+id).val() + '</strong>');
                                        $('#approve_decline_div_'+id).hide();
                                        $('#approve_decline_span_'+id).html($('#approve_decline_status_'+id).val());
                                        $('#approve_decline_current').hide();
                                    }else{
                                        printMsg(response, 'error');
                                    }
                                } )
                                        .catch( error => console.error('Error:', error));
                            }
                            catch(err) { //catch any problem so we can re-eneable submit
                                console.log('try catch error' + err);
                            }
                            $('#button_approve_decline_'+id).show();
                        }
                        function cancelAcceptDecline(id)
                        {
                            $('.popover').remove();
                            $('#approve_decline_span_'+id).html("Approve / Decline");
                            $('#approve_decline_div_'+id).hide();
                        }
                        function popApprove(id)
                        {
                            $('.popover').remove();
                            $('#approve_decline_hidden_'+id).val("/files/updateStatus/"+id);
                            $('#approve_decline_status_'+id).val('approved');
                            $('#approve_decline_span_'+id).html("<strong>Approval</strong> Note (optional)");
                            $('#approve_decline_div_'+id).show();
                        }
                        function popDecline(id)
                        {
                            $('.popover').remove();
                            $('#approve_decline_hidden_'+id).val("/files/updateStatus/"+id);
                            $('#approve_decline_status_'+id).val('declined');
                            $('#approve_decline_span_'+id).html("<strong>Decline</strong> Note (optional)");
                            $('#approve_decline_div_'+id).show();
                        }
                        $(function () {
                            $('[data-toggle="popover"]').popover( {
                                trigger: 'click, hover',
                                delay: {
                                    hide: "2000"
                                },
                                html: true
                            })
                        })
                    </script>
                    <style type="text/css">
                        .tooltip{
                            z-index: 1499 !important;
                        }
                        .approved{
                            color: #228B22;
                        }
                        .declined{
                            color: #FF0000;
                        }
                        .none{
                            color:#000;
                        }
                    </style>
                    <?php }else
                    {
                    echo '<strong> No Proof Files uploaded yet for this order </strong>';
                    }
                    ?>

                </div>
