<div class="container">
<h3> <?= $judul ?> </h3>
<hr>
<div class="row">
  <div class="col s2">
    <h5>Check-In</h5>
    <ul>
      <li>
        <?php
          for ($l=1; $l<=12 ; $l++) {
            ?>
            <li>
              <a href="<?= base_url() ?>/guests/<?= $l?>">Bulan <?= $l ?></a>
            </li>
            <?php
          }
         ?>
      </li>
    </ul>
  </div>
  <div class="col s10">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Negara</th>
          <th>Check In</th>
          <th>Check Out</th>
          <th>Room</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($guests as $guest): ?>
        <tr>
          <td> <?= $guest['member_ID'] ?></td>
          <td> <?= $guest['nama'] ?></td>
          <td> <?= $guest['Country'] ?></td>
          <td> <?= $guest['date_in'] ?></td>
          <td> <?= $guest['date_out'] ?></td>
          <td> <?= $guest['room'] ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
