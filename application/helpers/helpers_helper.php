<?php

function money($value) {
  $format = "Rp " . number_format((float)$value,0,',','.');
  return $format;
}