import db from "../lib/db.js";

export default async function handler(req, res) {

    if (req.method !== "GET") {
        return res.status(405).json({
            success:false,
            message:"Method tidak diizinkan"
        });
    }

    try{

        const [rows]=await db.execute(`
            SELECT
            id,
            nama,
            produk,
            ukuran,
            hp,
            pembayaran,
            alamat,
            rating
            FROM orders
            ORDER BY id DESC
        `);

        res.status(200).json({

            success:true,

            total:rows.length,

            data:rows

        });

    }catch(err){

        console.log(err);

        res.status(500).json({

            success:false,

            message:err.message

        });

    }

}
