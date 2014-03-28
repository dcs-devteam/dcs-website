<div class="faculty-container clearfix">
  <div class="faculty-group" id="faculty">
    <h1>Faculty</h1>
    
    <div class="tile-wrapper clearfix">
      <?php foreach ($faculty as $teacher): ?>
        <?php echo $teacher->body; ?>
      <?php endforeach; ?>
      
      <div class="tile clearfix">
        <div class="image" style="background-image: url('<?= base_url() . 'assets/images/sample-project.jpg' ?>');"></div>
        <div class="information-container clearfix">
          <div class="field">          
            <p>Emmanuel T. Lodovice</p>
          </div>
          <div class="field">          
            <p>Faculty 1</p>
          </div>
          <div class="field">          
            <p>name3anad@gmail.com</p>
          </div>
          <div class="field">          
            <ul>
              <li>Masters in Computer Science at The University of the Philippines </li>
              <li>Masters in Engineering at MIT</li>
            </ul>
          </div>
          <div class="field">              
            <p>AI, Modeling and Simulation</p>
          </div>
        </div>
      </div>    
      
    </div>      
    
    <br>
    <!-- <p class="upcoming-content">Content to be provided soon.</p> -->
  </div>      
</div>