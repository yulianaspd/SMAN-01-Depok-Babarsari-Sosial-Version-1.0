m nb<section id="padding-top"></section>
<section style="padding:10px;background-color: rgb(228, 228, 228)">
 <div  class="container">
   <div style="background-color: #fff" class="semua-guru"  class="col-md-offset-1 col-md-10">
     <div class="page-header">
       <h1>Grup <small>semua grup</small></h1>
     </div>
     <div class="row">
      <?php foreach($view as $v):
      $id_grup = $v['id_grup'];      
      $user = $this->session->userdata('id');
      $count = $this->m_all->count_member($v['id_grup']);
      ?>
      <div class="col-sm-6 col-md-3">
        <div class="thumbnail">         
          <img height="200px" src="<?php echo base_url('assets/img/grup/3.png')?>" alt="...">
          <div class="caption">
            <h3><a href="<?php echo site_url('grup/welcome')?>"><?php echo $v['nama_grup']?></a></h3>
            <small>Created <?php echo $v['created']?></small>
            <p><?php echo $v['deskripsi_grup']?></p>
            <?php 
           //CEK YANG LOGIN SISWA ATAU GURU
            if($this->session->userdata('siswa_logged_in')) {
              //CEK MEMBER OR NOT
              if($this->m_all->check_member_as_siswa($id_grup,$user)){
                echo '<p style="color:gray"><form action="'.site_url("process/siswa/unjoin_grup").'" method="POST"><input type="hidden" name="idgrup" value="'.$id_grup.'"><button type="submit" name="btn_unjoin" class="btn btn-xs btn-default">Joined</button> <small>member '.$count.'</small></form></p>';
              } else {
                echo '<p style="color:gray"><form action="'.site_url("process/siswa/join_grup").'" method="POST"><input type="hidden" name="idgrup" value="'.$id_grup.'"><button type="submit" name="btn_join" class="btn btn-xs btn-primary">Join</button> <small>member '.$count.'</small></form></p>';
              }
            } else if ($this->session->userdata('guru_logged_in')){
              //CEK MEMBER OR NOT
              if($this->m_all->check_member_as_guru($id_grup,$user)){
                echo '<p style="color:gray"><form action="'.site_url("process/guru/unjoin_grup").'" method="POST"><input type="hidden" name="idgrup" value="'.$id_grup.'"><button type="submit" name="btn_unjoin" class="btn btn-xs btn-default">Joined</button> <small>member '.$count.'</small></form></p>';
              } else {
                echo '<p style="color:gray"><form action="'.site_url("process/guru/join_grup").'" method="POST"><input type="hidden" name="idgrup" value="'.$id_grup.'"><button type="submit" name="btn_join" class="btn btn-xs btn-primary">Join</button> <s>member '.$count.'</form></p>';
              }
            }
            ?>

          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
</div>
</section>