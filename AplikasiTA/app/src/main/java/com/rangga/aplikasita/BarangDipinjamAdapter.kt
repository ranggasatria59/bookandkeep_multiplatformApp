package com.rangga.aplikasita

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView

class BarangDipinjamAdapter(
    val result: ArrayList<PinjamModel.Data>

): RecyclerView.Adapter<BarangDipinjamAdapter.ViewHolder>(){
    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int) = BarangDipinjamAdapter.ViewHolder(
        LayoutInflater.from(parent.context)
            .inflate(R.layout.adapter_barang_dipinjam, parent, false)
    )

    override fun onBindViewHolder(holder: BarangDipinjamAdapter.ViewHolder, position: Int) {
        val pinjaman = result[position]
        holder.textNamaBarang_Dipinjam.text = pinjaman.nama_barang
        holder.textNamaPeminjam_Dipinjam.text = pinjaman.peminjam
        holder.telponpinjam_Dipinjam.text = pinjaman.telpon
        holder.jmlbrgpinjam_Dipinjam.text = pinjaman.jml_barang
        holder.tglbrgpinjam_Dipinjam.text = pinjaman.tgl_pinjam
        holder.tglbrgkmbli_Dipinjam.text = pinjaman.tgl_kembali
        holder.id_barang.text = pinjaman.id_barang
        holder.id_user.text = pinjaman.id_user
    }

    override fun getItemCount() = result.size

    class ViewHolder(view: View) : RecyclerView.ViewHolder(view) {
        val textNamaBarang_Dipinjam = view.findViewById<TextView>(R.id.text_namabarangDipinjam)
        val textNamaPeminjam_Dipinjam = view.findViewById<TextView>(R.id.text_namaDipinjam)
        val telponpinjam_Dipinjam = view.findViewById<TextView>(R.id.text_namatelponDipinjam)
        val jmlbrgpinjam_Dipinjam = view.findViewById<TextView>(R.id.text_jmlbarangDipinjam)
        val tglbrgpinjam_Dipinjam = view.findViewById<TextView>(R.id.text_tglbarangDipinjam)
        val tglbrgkmbli_Dipinjam = view.findViewById<TextView>(R.id.text_tglbarangkembali)
        val id_barang = view.findViewById<TextView>(R.id.text_id_barang)
        val id_user = view.findViewById<TextView>(R.id.text_id_user)
    }

    public fun setData(permintaan: List<PinjamModel.Data>){
        result.clear()
        result.addAll(permintaan)
        notifyDataSetChanged()
    }

}