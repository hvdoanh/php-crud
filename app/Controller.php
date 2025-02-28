<?php

namespace App;

class Controller
{

      public function validate($validator, $data, $rules)
      {
            $validation = $validator->make($data, $rules);

            //then validate
            $validation->validate();

            if ($validation->fails()) {
                  return $validation->errors()->firstOfAll();
            }

            return []; 
      }
      public function logError($message)
      {
            $data = date('d-m-Y');

            error_log($message, 3, "storage/logs/$data.log");
      }

      public function  uploadFile(array $file, $folder = null)
      {
            $fileTmpPath = $file['tmp_name']; // đường dẫn tạm thời của file
            $fileName = time() . '-' . $file['name']; // tên file chống trùng bằng timestamp

            $uploadDir = 'storage/uploads/' . $folder . '/';

            // tạo thư mục nếu chưa có
            if (!is_dir($uploadDir)) {
                  mkdir($uploadDir, 0755, true);
            }
            // đường dẫn đầy đủ để lưu file 
            $destPath = $uploadDir . $fileName;


            // di chuyển file từ thư mục tạm thời đến thư mục đích
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                  return $destPath;
            }
            throw new \Exception('Lỗi upload file');
      }


      
}