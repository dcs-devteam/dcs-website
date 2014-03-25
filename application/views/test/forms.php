<DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <?php $this->load->view('partials/head'); ?>
  <title>DCS Forms Test Page</title>
</head>

<body>
  <form action="#" method="POST">

    <div class="field">
      <label>text</label>
      <input type="text" />
    </div>

    <div class="field">
      <label>email</label>
      <input type="email" />
    </div>

    <div class="field">
      <label>password</label>
      <input type="password" />
    </div>

    <div class="field">
      <label>number</label>
      <input type="number" />
    </div>

    <div class="field">
      <label>date</label>
      <input type="date" />
    </div>

    <div class="field">
      <label>url</label>
      <input type="url" />
    </div>

    <div class="field">
      <label>search</label>
      <input type="search" />
    </div>

    <div class="field">
      <label>checkbox</label>
      <label class="checkbox"><input type="checkbox" />checkbox label</label>
      <label class="checkbox"><input type="checkbox" />checkbox label</label>
    </div>

    <div class="field">
      <label>radio</label>
      <label class="radio"><input type="radio" />radio label</label>
      <label class="radio"><input type="radio" />radio label</label>
    </div>

    <div class="field">
      <label>select</label>
      <select>
        <option>value 1</option>
        <option>value 2</option>
        <option>value 3</option>
      </select>
    </div>

    <div class="field">
      <label class="vtop">textarea</label>
      <textarea></textarea>
    </div>

    <div class="field actions">
      <input type="submit" value="Green" class="button green" />
      <input type="button" value="Maroon" class="button maroon" />
    </div>
  </form>
</body>
</html>