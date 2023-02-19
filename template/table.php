<?php

function ess_tabel_currenty_view()
{
  $currenty = get_currenty();
  $string_currency = get_option('currency_tab_ess');

  if (empty($string_currency)) {
    $array_currency = ['USD', 'EUR', 'PLN', 'GBP', 'NOK', 'CHF', 'CZK', 'SEK'];
  } else {
    $array_currency = explode(',', $string_currency);
  }
?>

  <div class="container">
    <div class="currency">
      <table>
        <thead>
          <tr>
            <th>Waluta</th>
            <th>Kupno</th>
            <th>Sprzedaż</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($currenty as $item) : ?>
            <?php if (in_array($item['post_title'], $array_currency)) : ?>
              <tr>
                <td> <?= $item['post_title'] ?></td>
                <td> <?= currency_status($item) ?></td>
                <td> <?= currency_status($item, 'sell') ?></td>
              </tr>
            <?php endif; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
<?php

}
