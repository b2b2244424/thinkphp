 <?php
	 //�б�
		public function index() {
			$information = M("Information");
			$map['is_delete'] = 0;
			$sql = "SELECT i.*,m.username FROM lm_information i LEFT JOIN lm_manage m ON m.id=i.create_by WHERE i.is_delete=0";
			$list = M()->query($sql);
			$this->assign('list', $list);
			$this->display();
		}

		//��ʦ���
		public function add() {
			$this->display();
		}

		//�༭
		public function edit($id) {

			$information = M("Information");
			if (!$id) {
				$this->error('���ݲ�����');
			}
			$data = $information->find($id);
			$this->assign('data', $data);
			$this->display('add');
		}
	//��Ӻ͸��£��ж�$data['id'] > 0���޸ģ���������
		public function update() {
			$information = M("Information");
			if (IS_POST) {
				$data = $information->create();
				if ($data['id'] > 0) {
					//�޸�ͼƬ�ϴ�ʱ���ж���ǰ�Ƿ���ͼƬ
					if ($_FILES['img_url']['tmp_name']) {
						//��unlink������ɾ��ԭ����ͼƬ
						@unlink("./Uploads" . $data['img_url']);
						//֮���������ͼƬ
						$info = $this->upload();
						foreach ($info as $file) {
							$data['img_url'] = $file['savepath'] . $file['savename'];
						}
					}
					//��ȡ������ip
					$data['lastloginip'] = get_client_ip();
					$data['lastlogintime'] = time();
					$information->save($data);
					$this->success('�����ɹ���', U('index'));
					die();
				} else {
					$info = $this->upload();
					foreach ($info as $file) {
						$data['img_url'] = $file['savepath'] . $file['savename'];
					}
					$data['reg_ip'] = get_client_ip();
					$data['create_time'] = time();
					$data['create_by'] = get_uid();
					$information->add($data);
					$this->success('�����ɹ���', U('index'));
					die();
				}
				$this->error('����ʧ��');
			} else {
				$this->error('������Դ');
			}
		}

		//ɾ������
		public function del($id) {
			if ($id > 0) {
				$information = M("Information");
				$data['is_delete'] = 1;
				$map['id'] = $id;
				$information->where($map)->save($data);
				$this->success('�����ɹ�');
			} else {
				$this->error('����ʧ��');
			}
		}
	?>