<?php
class Dashboard_model extends CI_Model
{
    public function tampilkan()
    {
        return $this->db->get('content');
    }

    public function tambah($judul, $isi, $kategori)
    {
        $this->db->insert('content', ['judul' => $judul, 'isi' => $isi, 'kategori' => $kategori]);
    }

    public function page($id)
    {
        return $this->db->get_where('content', ['id' => $id]);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('content');
    }

    public function edit($id)
    {
        return $this->db->get_where('content', ['id' => $id]);
    }

    public function post($id, $judul, $isi, $kategori)
    {
        $this->db->where('id', $id);
        $this->db->update('content', ['judul' => $judul, 'isi' => $isi, 'kategori' => $kategori]);
    }
}
