<?php


namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Category;
use Rakit\Validation\Validator;

class CategoryController extends Controller
{
      private Category $category;

      public function __construct()
      {
            $this->category = new Category();
      }

      public function index()
      {
            $title = 'Danh sách danh mục';

            $data = $this->category->findAll();

            return view(
                  'admin.categories.index',
                  compact(
                        'title',
                        'data'
                  )
            );
      }

      public function create()
      {
            $title = 'Thêm mới danh mục';

            return view('admin.categories.create', compact('title'));
      }

      public function store()
      {
            try {
                  $data = $_POST + $_FILES;

                  $validator = new Validator;

                  $errors = $this->validate(
                        $validator,
                        $data,
                        [
                              'name'      => [
                                    'required',
                                    'max:50',
                                    function ($value) {
                                          $flag = (new Category)->checkExistsNameForCreate($value);
                                          if ($flag) {
                                                return ":attribute has existed";
                                          }
                                    }
                              ],
                              'img'       => 'nullable|uploaded_file:0,2048K,png,jpeg,jpg',
                              'is_active'       => [$validator('in', [0, 1])]
                        ]
                  );

                  if (!empty($errors)) {
                        $_SESSION['status'] = false;
                        $_SESSION['msg']        = 'Thao tác không thành công';
                        $_SESSION['data']       = $_POST;
                        $_SESSION['errors']     = $errors;

                        redirect('/admin/categories/create');
                  } else {
                        $_SESSION['data'] = null;
                  }

                  // upload ảnh
                  if (is_upload('img')) {
                        $data['img'] = $this->uploadFile($data['img'], 'categories');
                  } else {
                        $data['img'] = null;
                  }

                  // điều chỉnh
                  $data['is_active'] = $data['is_active'] ?? 0;

                  // insert 
                  $this->category->insert($data);

                  $_SESSION['status']     = true;
                  $_SESSION['msg']        = 'Thao tác thành công';

                  redirect('/admin/categories');
            } catch (\Throwable $th) {
                  $this->logError($th->__tostring());
                  $_SESSION['status'] = false;
                  $_SESSION['msg']    = 'Thao tác không thành công';
                  $_SESSION['data']  = $_POST;

                  redirect('/admin/categories/create');
            }
      }

      public function show($id)
      {
            $cate = $this->category->find($id);

            if (empty($cate)) {
                  redirect404();
            }

            $title = 'Chi tiết danh mục';

            return view(
                  'admin.categories.show',
                  compact(
                        'title',
                        'cate'
                  )
            );
      }

      public function delete($id)
      {
            $cate = $this->category->find($id);

            if (empty($cate)) {
                  redirect404();
            }

            $this->category->delete($id);

            if ($cate['img'] && file_exists($cate['img'])) {
                  unlink($cate['img']);
            }
            redirect('/admin/categories');
      }

      public function edit($id)
      {
            $cate = $this->category->find($id);

            if (empty($cate)) {
                  redirect404();
            }

            $title = 'trang chỉnh sửa';

            return view(
                  'admin.categories.edit',
                  compact(
                        'cate',
                        'title'
                  )
            );
      }

      public function update($id)
      {
            $cate = $this->category->find($id);


            if (empty($cate)) {
                  redirect404();
            }

            try {

                  $data = $_POST + $_FILES;



                  $validator = new Validator;

                  $errors = $this->validate(
                        $validator,
                        $data,
                        [
                              'name'            => [
                                    'required',
                                    'max:50',
                                    function ($value) use ($id) {
                                          $flag = (new Category)->checkExistsNameForUpdate($id, $value);
                                          if ($flag) {
                                                return ":attribute has existed";
                                          }
                                    }
                              ],
                              'img'       => 'nullable|uploaded_file:0,2048K,png,jpeg,jpg',
                              'is_active'       => [$validator('in', [0, 1])]
                        ]
                  );

                  if (!empty($errors)) {
                        $_SESSION['status']     = false;
                        $_SESSION['msg']        = 'Thao tác không thành công';
                        $_SESSION['errors']     = $errors;

                        redirect('/admin/categories/edit/' . $id);
                  }

                  if (is_upload('img')) {
                        $data['img'] = $this->uploadFile($data['img'], 'categories');
                  } else {
                        $data['img'] = $cate['img'];
                  }

                  // điều chỉnh dữ liệu
                  $data['is_active'] = $data['is_active'] ?? 0;
                  $data['updated_at'] = date('Y-m-d H:i:s');

                  // update
                  $this->category->update($id, $data);

                  if (
                        $data['img'] != $cate['img']
                        && $cate['img']
                        && file_exists($cate['img'])
                  ) {
                        unlink($cate['img']);
                  }

                  $_SESSION['status']     = true;
                  $_SESSION['msg']        = 'Thao tác thành công';

                  redirect('/admin/categories/edit/' . $id);
            } catch (\Throwable $th) {
                  $this->logError($th->__tostring());

                  $_SESSION['status']     = false;
                  $_SESSION['msg']        = ' Thao tác không thành công';

                  redirect('/admin/categories/edit/' . $id);
            }
      }
}