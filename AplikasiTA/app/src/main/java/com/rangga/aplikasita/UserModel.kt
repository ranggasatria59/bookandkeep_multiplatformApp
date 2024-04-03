package com.rangga.aplikasita

class UserModel (
    val result: List<Data>
        )
{
    data class Data(val id_user: String?,val nama: String?, val username: String?)
}