<div class="container">
<h3> <?= $judul ?> </h3>
<hr>
<div class="row">
  <div class="col s2">
    <h5>Lantai</h5>
    <ul>
      <?php
        for ($l=1; $l<=15 ; $l++) {
          ?>
          <li>
            <a href="<?= base_url() ?>/rooms/<?= $l?>">lantai <?= $l ?></a>
          </li>
          <?php
        }
       ?>
    </ul>
  </div>
  <div class="col s10">
    <table>
      <thead>
        <tr>
          <th>Rooms</th>
          <th>Type</th>
          <th>Views</th>
          <th>Final Rate</th>
          <th>Check-In</th>
          <th>Check-Out</th>
          <th>Availability</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($rooms as $room): ?>
        <tr>
          <td> <?= $room['room'] ?></td>
          <td> <?= $room['rtype'] ?></td>
          <td> <?= $room['dview'] ?></td>
          <td> <?= $room['frate'] ?></td>
          <td> <?= $room['date_in'] ?></td>
          <td> <?= $room['date_out'] ?></td>
          <td>
            <?php if (empty($room['date_out'])): echo "UNAVAILABLE";?>
            <?php else: echo "AVAILABLE";?>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
