<?php
function processFile(string $filePath): array {
  // Acquire an exclusive lock on the file
  $fp = fopen($filePath, 'r+');
  if (!$fp) {
    return []; // Handle file opening errors appropriately
  }

  if (flock($fp, LOCK_EX)) {
    $fileContents = [];
    // ... process the file ...
    flock($fp, LOCK_UN); // Release the lock
  } else {
    return []; // Failed to acquire lock, handle accordingly 
  }
  fclose($fp);
  return $fileContents;
}
// ... rest of your code ...
?>