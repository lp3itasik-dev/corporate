<script>
  var timer2 = "30:00";
  var key = "unlock";
  $(document).ready(function() {
    if("<?= $this->session->userdata('lock') ?>"=="locked"){lock();}
    var interval = setInterval(function() {
      if(timer2!="0:00"){
        var timer = timer2.split(':');
        //by parsing integer, I avoid all extra string processing
        var minutes = parseInt(timer[0], 10);
        var seconds = parseInt(timer[1], 10);
        --seconds;
        minutes = (seconds < 0) ? --minutes : minutes;
        if (minutes < 0) clearInterval(interval);
        seconds = (seconds < 0) ? 59 : seconds;
        seconds = (seconds < 10) ? '0' + seconds : seconds;
        //minutes = (minutes < 10) ?  minutes : minutes;
        timer2 = minutes + ':' + seconds;
      }
      if(timer2=="0:00" && key == "unlock"){lock();}
    }, 1000);

    $("#myFormLock").submit(function(e){
        e.preventDefault();
    });
    $('[name="password"]').on('keypress',function(e) {
        if(e.which == 13) {
            ceklock();
        }
    });
  });
  function lock(){
		$('#myModalLock').modal({backdrop: 'static', keyboard: false});
    $('#st-lock').load("<?= base_url() ?>lock");
    $('#msgLock').html('');
    $('[name="password"]').val("");
    key = "locked";
	}
	function ceklock(){
		$('#msgLock').html('<b class="text-info">Loading...</b>');
    var form = document.getElementById('myFormLock');
    var data = new FormData(form);
    $.ajax({
      type: 'POST',
      url: "<?= base_url() ?>cek-lock",
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        if(data=="false"){
          $('#msgLock').html('<b class="text-danger">Password salah!</b> ');
        }else{
          $('#msgLock').html('<b class="text-success">Berhasil Unlock!</b>');
          $('#myModalLock').modal('toggle');
          timer2 = "5:00";
          key = "unlock";
        }
      }, error: function(response){
        console.log(response.responseText);
        $('#msgLock').html('<b class="text-danger">Silahkan Login Kembali!</b>');
        window.location="<?= base_url() ?>";
      }
    });
	}
</script>

<div id="myModalLock" class="modal row modal-lock">
	<div class="m-0 col-12 modal-content-lock">
		<div class="modal-content modal-content-lock bg-lp3i-grd">
			<div class="modal-body modal-content-lock">
				<div class="content d-flex justify-content-center align-items-center modal-content-lock">

					<!-- Login card -->
					<form class="login-form" action="#" id="myFormLock">
	          @csrf
						<div class="card mb-0">
							<div class="card-body ">
								<div class="text-center mb-2 pt-4">
									<img src="<?= base_url() ?>template/global_assets/images/silt.png" class="col-6">
									<span class="d-block text-muted mt-2">Sistem Informasi LP3i Tasikmalaya</span>
									<h5 class="mb-0 text-dark" id="st-lock">LOCKED</h5>
	                <span class="d-block" id="msgLock"></span>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="password" name="password" class="form-control" placeholder="Password">
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
								</div>

								<div class="form-group text-right mb-2">
									<button type="button" class="btn btn-dark btn-block mb-2" onclick="return ceklock()">Unlock <i class="icon-circle-right2 ml-2"></i></button>
                  <a href="<?= base_url() ?>logout">Login Akun Lain?</a>
								</div>

							</div>
						</div>
					</form>
					<!-- /login card -->

				</div>
			</div>
		</div>
	</div>
</div>
