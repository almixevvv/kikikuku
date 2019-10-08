<?php Class M_user extends CI_Model {

		function checkExistingEmail($email) {

			$this->db->select('EMAIL');
			$this->db->from('g_member');
			$this->db->where('EMAIL', $email);

			$query = $this->db->get();

			return $query;
    }

		function sentResetPassword($data) {

			$this->db->insert('g_reset_password', $data);

		}

		function checkPassword($password) {

			$this->db->select('PASSWORD');
			$this->db->from('g_member');
			$this->db->where('PASSWORD', $password);

			$query = $this->db->get();

			return $query;
    }

		function checkVerified($email) {

			$this->db->select('STATUS');
			$this->db->from('g_member');
			$this->db->where('EMAIL', $email);
			$this->db->where('STATUS', 'ACTIVE');

			$query = $this->db->get();

			return $query;
		}

		function loginUser($email, $password) {

			$this->db->select('*');
			$this->db->from('g_member');
			$this->db->where('EMAIL', $email);
			$this->db->where('PASSWORD', $password);

			$query = $this->db->get();

			return $query;

		}

		function getResetStatus($email) {

			$this->db->select('*');
			$this->db->from('g_reset_password');
			$this->db->where('USER_EMAIL', $email);

			$query = $this->db->get();

			return $query;

		}

		function updatePassword($email, $data) {

			$this->db->where('EMAIL', $email);
			$this->db->update('g_member', $data);

		}

		function updateResetStatus($email, $data) {

			$this->db->where('USER_EMAIL', $email);
			$this->db->update('g_reset_password', $data);

		}

		function registration($data) {

			if($this->db->insert('g_member', $data)) {
        return true;
      } else {
        return false;
      }

		}

		function verifyAccount($hash) {

			$this->db->select('*');
			$this->db->from('g_member');
			$this->db->where('HASH', $hash);
			$this->db->where('STATUS', 'PENDING');

			$query = $this->db->get();

			return $query;

		}

		function updateStatus($email) {

			$this->db->set('STATUS', 'ACTIVE');
			$this->db->where('EMAIL', $email);

			if($this->db->update('g_member')) {
				return true;
			} else {
				return false;
			}

		}

}
