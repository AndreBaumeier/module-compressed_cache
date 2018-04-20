<?php
namespace Drupal\compressed_cache\Cache;

use Drupal\Core\Cache\DatabaseBackendFactory;

class DatabaseCompressedBackendFactory extends DatabaseBackendFactory {

  /**
   * Gets DatabaseBackend for the specified cache bin.
   *
   * @param $bin
   *   The cache bin for which the object is created.
   *
   * @return \Drupal\Core\Cache\DatabaseBackend
   *   The cache backend object for the specified cache bin.
   */
  public function get($bin) {
    $max_rows = $this->getMaxRowsForBin($bin);

    $cache_compression_ratio = 6;
    $cache_compression_size_threshold = 100;

    return new DatabaseCompressedBackend($this->connection, $this->checksumProvider, $bin, $max_rows, $cache_compression_ratio, $cache_compression_size_threshold);
  }

}