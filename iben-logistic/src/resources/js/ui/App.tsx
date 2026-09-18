import { useState } from "react";
import {
  Truck,
  Plane,
  Package,
  MapPin,
  Phone,
  Mail,
  Camera,
  Globe,
  LayoutDashboard,
  Settings,
  Layers,
  Pencil,
  Trash2,
  UploadCloud,
  Menu,
  X,
  Users,
  TrendingUp,
  CheckCircle,
  Clock,
  AlertCircle,
  ChevronRight,
  Bell,
  User,
  Save,
  Eye,
  FileText,
  Boxes,
  Star,
  LogOut,
  ShieldCheck,
} from "lucide-react";

/* ─── Types ─── */
interface Service {
  id: number;
  nama: string;
  deskripsi: string;
  status: "Aktif" | "Nonaktif";
  ikon: string;
}

interface Armada {
  id: number;
  nomorKendaraan: string;
  tipe: string;
  kapasitas: string;
  status: "Tersedia" | "Beroperasi" | "Servis";
  driver: string;
}

interface Pengiriman {
  id: string;
  pelanggan: string;
  tujuan: string;
  layanan: string;
  status: "Selesai" | "Dalam Proses" | "Tertunda";
  tanggal: string;
}

interface AnggotaTim {
  id: number;
  nama: string;
  jabatan: string;
  email: string;
  status: "Aktif" | "Cuti";
}

/* ─── Seed Data ─── */
const SEED_LAYANAN: Service[] = [
  { id: 1, nama: "Angkutan Darat", deskripsi: "Transportasi jalan raya untuk semua jenis kargo.", status: "Aktif", ikon: "Truck" },
  { id: 2, nama: "Kargo Udara", deskripsi: "Pengiriman ekspres untuk kiriman sensitif waktu.", status: "Aktif", ikon: "Plane" },
  { id: 3, nama: "Pergudangan", deskripsi: "Fasilitas penyimpanan aman dengan pemantauan 24 jam.", status: "Aktif", ikon: "Package" },
];

const SEED_ARMADA: Armada[] = [
  { id: 1, nomorKendaraan: "B 1234 IBN", tipe: "Truk Besar", kapasitas: "20 Ton", status: "Beroperasi", driver: "Ahmad Fauzi" },
  { id: 2, nomorKendaraan: "B 5678 IBN", tipe: "Truk Sedang", kapasitas: "10 Ton", status: "Tersedia", driver: "Budi Santoso" },
  { id: 3, nomorKendaraan: "B 9012 IBN", tipe: "Van Kargo", kapasitas: "2 Ton", status: "Servis", driver: "Cahyo Wibowo" },
  { id: 4, nomorKendaraan: "B 3456 IBN", tipe: "Truk Besar", kapasitas: "20 Ton", status: "Tersedia", driver: "Dian Pratama" },
];

const SEED_PENGIRIMAN: Pengiriman[] = [
  { id: "IBN-2026-001", pelanggan: "PT Maju Bersama", tujuan: "Surabaya", layanan: "Angkutan Darat", status: "Selesai", tanggal: "2026-09-01" },
  { id: "IBN-2026-002", pelanggan: "CV Sinar Jaya", tujuan: "Medan", layanan: "Kargo Udara", status: "Dalam Proses", tanggal: "2026-09-03" },
  { id: "IBN-2026-003", pelanggan: "PT Cahaya Nusantara", tujuan: "Makassar", layanan: "Angkutan Darat", status: "Tertunda", tanggal: "2026-09-04" },
  { id: "IBN-2026-004", pelanggan: "UD Berkah Abadi", tujuan: "Bandung", layanan: "Pergudangan", status: "Selesai", tanggal: "2026-08-30" },
  { id: "IBN-2026-005", pelanggan: "PT Surya Mandiri", tujuan: "Semarang", layanan: "Angkutan Darat", status: "Dalam Proses", tanggal: "2026-09-04" },
];

const SEED_TIM: AnggotaTim[] = [
  { id: 1, nama: "Ibnu Anjang", jabatan: "Founder & CEO", email: "ibnu@ibenlogistic.co.id", status: "Aktif" },
  { id: 2, nama: "Siti Rahayu", jabatan: "Manajer Operasional", email: "siti@ibenlogistic.co.id", status: "Aktif" },
  { id: 3, nama: "Rizky Pratama", jabatan: "Kepala Armada", email: "rizky@ibenlogistic.co.id", status: "Aktif" },
  { id: 4, nama: "Dewi Lestari", jabatan: "Admin Keuangan", email: "dewi@ibenlogistic.co.id", status: "Cuti" },
];

const NAV_LINKS = ["Beranda", "Tentang", "Layanan", "Galeri", "Tim", "Kontak"];
const NAV_IDS   = ["home", "about", "services", "gallery", "team", "contact"];

const MENU_ADMIN = [
  { label: "Dasbor",          Icon: LayoutDashboard },
  { label: "Kelola Layanan",  Icon: Layers },
  { label: "Kelola Armada",   Icon: Truck },
  { label: "Data Pengiriman", Icon: FileText },
  { label: "Kelola Tim",      Icon: Users },
  { label: "Pengaturan",      Icon: Settings },
];

/* ─── Status Badge ─── */
function StatusBadge({ status }: { status: string }) {
  const map: Record<string, string> = {
    Aktif:        "bg-blue-100 text-blue-800 border border-blue-300",
    Nonaktif:     "bg-white text-blue-400 border border-blue-200",
    Tersedia:     "bg-blue-100 text-blue-800 border border-blue-300",
    Beroperasi:   "bg-blue-900 text-white",
    Servis:       "bg-blue-200 text-blue-700",
    Selesai:      "bg-blue-900 text-white",
    "Dalam Proses": "bg-blue-200 text-blue-800",
    Tertunda:     "bg-white text-blue-500 border border-blue-300",
    Cuti:         "bg-blue-100 text-blue-600 border border-blue-200",
  };
  return (
    <span className={`inline-block px-2.5 py-0.5 rounded-full text-xs font-semibold ${map[status] ?? ""}`}>
      {status}
    </span>
  );
}

/* ─── Admin: Dasbor ─── */
function AdminDasbor({ layanan, armada, pengiriman, tim }: {
  layanan: Service[]; armada: Armada[]; pengiriman: Pengiriman[]; tim: AnggotaTim[];
}) {
  const selesai    = pengiriman.filter(p => p.status === "Selesai").length;
  const proses     = pengiriman.filter(p => p.status === "Dalam Proses").length;
  const tertunda   = pengiriman.filter(p => p.status === "Tertunda").length;
  const tersedia   = armada.filter(a => a.status === "Tersedia").length;

  const stats = [
    { label: "Total Layanan",     value: layanan.length,        Icon: Layers,      sub: `${layanan.filter(l=>l.status==="Aktif").length} aktif` },
    { label: "Total Armada",      value: armada.length,         Icon: Truck,       sub: `${tersedia} tersedia` },
    { label: "Total Pengiriman",  value: pengiriman.length,     Icon: TrendingUp,  sub: `${proses} sedang berjalan` },
    { label: "Anggota Tim",       value: tim.length,            Icon: Users,       sub: `${tim.filter(t=>t.status==="Aktif").length} aktif` },
  ];

  return (
    <div className="space-y-8">
      {/* Stat cards */}
      <div className="grid grid-cols-2 xl:grid-cols-4 gap-4">
        {stats.map(({ label, value, Icon, sub }) => (
          <div key={label} className="bg-white border border-blue-100 rounded-xl p-5 shadow-sm">
            <div className="flex items-center justify-between mb-3">
              <p className="text-xs font-medium text-blue-500 uppercase tracking-wide">{label}</p>
              <div className="w-8 h-8 bg-blue-900 rounded-lg flex items-center justify-center">
                <Icon size={14} className="text-white" />
              </div>
            </div>
            <p className="font-display text-3xl font-bold text-blue-900">{value}</p>
            <p className="text-xs text-blue-500 mt-1">{sub}</p>
          </div>
        ))}
      </div>

      {/* Status pengiriman */}
      <div className="grid md:grid-cols-3 gap-4">
        {[
          { label: "Selesai",      value: selesai,  Icon: CheckCircle, color: "text-blue-900" },
          { label: "Dalam Proses", value: proses,   Icon: Clock,       color: "text-blue-600" },
          { label: "Tertunda",     value: tertunda, Icon: AlertCircle, color: "text-blue-400" },
        ].map(({ label, value, Icon, color }) => (
          <div key={label} className="bg-blue-50 border border-blue-200 rounded-xl p-5 flex items-center gap-4">
            <Icon size={32} className={color} />
            <div>
              <p className="font-display text-2xl font-bold text-blue-900">{value}</p>
              <p className="text-sm text-blue-600">{label}</p>
            </div>
          </div>
        ))}
      </div>

      {/* Pengiriman terbaru */}
      <div>
        <h4 className="font-display font-semibold text-blue-900 mb-3">Pengiriman Terbaru</h4>
        <div className="border border-blue-200 rounded-xl overflow-hidden">
          <table className="w-full text-sm">
            <thead className="bg-blue-900 text-white">
              <tr>
                {["ID Kiriman", "Pelanggan", "Tujuan", "Status", "Tanggal"].map(h => (
                  <th key={h} className="px-4 py-3 text-left font-semibold text-xs">{h}</th>
                ))}
              </tr>
            </thead>
            <tbody className="divide-y divide-blue-100">
              {pengiriman.slice(0, 5).map((p, i) => (
                <tr key={p.id} className={i % 2 === 0 ? "bg-white" : "bg-blue-50/40"}>
                  <td className="px-4 py-3 font-mono text-xs text-blue-500">{p.id}</td>
                  <td className="px-4 py-3 text-blue-900 font-medium">{p.pelanggan}</td>
                  <td className="px-4 py-3 text-blue-700">{p.tujuan}</td>
                  <td className="px-4 py-3"><StatusBadge status={p.status} /></td>
                  <td className="px-4 py-3 text-blue-600 text-xs">{p.tanggal}</td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>

      {/* Armada ringkasan */}
      <div>
        <h4 className="font-display font-semibold text-blue-900 mb-3">Ringkasan Armada</h4>
        <div className="grid md:grid-cols-2 gap-4">
          {armada.map(a => (
            <div key={a.id} className="flex items-center gap-4 bg-white border border-blue-100 rounded-xl p-4 shadow-sm">
              <div className="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center shrink-0">
                <Truck size={18} className="text-blue-900" />
              </div>
              <div className="flex-1 min-w-0">
                <p className="font-semibold text-blue-900 text-sm">{a.nomorKendaraan}</p>
                <p className="text-xs text-blue-500">{a.tipe} · {a.driver}</p>
              </div>
              <StatusBadge status={a.status} />
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}

/* ─── Admin: Kelola Layanan ─── */
function AdminLayanan() {
  const [layanan, setLayanan] = useState<Service[]>(SEED_LAYANAN);
  const [editId, setEditId] = useState<number | null>(null);
  const [form, setForm] = useState({ nama: "", deskripsi: "", ikon: "Truck", status: "Aktif" as "Aktif" | "Nonaktif" });

  const reset = () => { setEditId(null); setForm({ nama: "", deskripsi: "", ikon: "Truck", status: "Aktif" }); };

  const simpan = () => {
    if (!form.nama.trim()) return;
    if (editId !== null) {
      setLayanan(prev => prev.map(l => l.id === editId ? { ...l, ...form } : l));
    } else {
      setLayanan(prev => [...prev, { id: Date.now(), ...form }]);
    }
    reset();
  };

  const mulaiEdit = (l: Service) => { setEditId(l.id); setForm({ nama: l.nama, deskripsi: l.deskripsi, ikon: l.ikon, status: l.status }); };
  const hapus = (id: number) => setLayanan(prev => prev.filter(l => l.id !== id));
  const toggleStatus = (id: number) => setLayanan(prev => prev.map(l => l.id === id ? { ...l, status: l.status === "Aktif" ? "Nonaktif" : "Aktif" } : l));

  return (
    <div className="space-y-8">
      {/* Form */}
      <div className="bg-blue-50 border border-blue-200 rounded-xl p-6">
        <h4 className="font-display font-semibold text-blue-900 mb-4">
          {editId !== null ? "Edit Layanan" : "Tambah Layanan Baru"}
        </h4>
        <div className="grid md:grid-cols-2 gap-4">
          <div>
            <label className="block text-xs font-medium text-blue-700 mb-1.5">Nama Layanan</label>
            <input value={form.nama} onChange={e => setForm({ ...form, nama: e.target.value })}
              placeholder="cth. Pengiriman Laut"
              className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white" />
          </div>
          <div>
            <label className="block text-xs font-medium text-blue-700 mb-1.5">Deskripsi</label>
            <input value={form.deskripsi} onChange={e => setForm({ ...form, deskripsi: e.target.value })}
              placeholder="Deskripsi singkat layanan"
              className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white" />
          </div>
          <div>
            <label className="block text-xs font-medium text-blue-700 mb-1.5">Ikon</label>
            <select value={form.ikon} onChange={e => setForm({ ...form, ikon: e.target.value })}
              className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white">
              {["Truck", "Plane", "Package", "Globe", "Boxes"].map(o => <option key={o}>{o}</option>)}
            </select>
          </div>
          <div>
            <label className="block text-xs font-medium text-blue-700 mb-1.5">Status</label>
            <select value={form.status} onChange={e => setForm({ ...form, status: e.target.value as "Aktif" | "Nonaktif" })}
              className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white">
              <option>Aktif</option>
              <option>Nonaktif</option>
            </select>
          </div>
        </div>
        <div className="mt-4 border-2 border-dashed border-blue-300 rounded-lg h-24 flex flex-col items-center justify-center gap-2 cursor-pointer hover:border-blue-500 transition-colors bg-white">
          <UploadCloud size={24} className="text-blue-400" />
          <span className="text-blue-500 text-xs font-medium">Klik atau seret untuk unggah gambar layanan</span>
        </div>
        <div className="mt-4 flex gap-3">
          <button onClick={simpan} className="flex items-center gap-2 px-5 py-2 bg-blue-900 text-white text-sm font-semibold rounded-md hover:bg-blue-800 transition-colors">
            <Save size={14} /> {editId !== null ? "Perbarui" : "Simpan Layanan"}
          </button>
          {editId !== null && (
            <button onClick={reset} className="px-5 py-2 border border-blue-300 text-blue-700 text-sm font-semibold rounded-md hover:bg-blue-50 transition-colors">Batal</button>
          )}
        </div>
      </div>

      {/* Tabel */}
      <div>
        <h4 className="font-display font-semibold text-blue-900 mb-3">Daftar Layanan ({layanan.length})</h4>
        <div className="border border-blue-200 rounded-xl overflow-hidden">
          <table className="w-full text-sm">
            <thead className="bg-blue-900 text-white">
              <tr>
                {["ID", "Nama Layanan", "Deskripsi", "Status", "Aksi"].map(h => (
                  <th key={h} className="px-4 py-3 text-left font-semibold text-xs">{h}</th>
                ))}
              </tr>
            </thead>
            <tbody className="divide-y divide-blue-100">
              {layanan.map((l, i) => (
                <tr key={l.id} className={i % 2 === 0 ? "bg-white" : "bg-blue-50/40"}>
                  <td className="px-4 py-3 font-mono text-xs text-blue-400">{l.id}</td>
                  <td className="px-4 py-3 font-medium text-blue-900">{l.nama}</td>
                  <td className="px-4 py-3 text-blue-700 max-w-xs truncate">{l.deskripsi}</td>
                  <td className="px-4 py-3"><StatusBadge status={l.status} /></td>
                  <td className="px-4 py-3">
                    <div className="flex items-center gap-2">
                      <button onClick={() => mulaiEdit(l)} className="flex items-center gap-1 px-2.5 py-1.5 border border-blue-300 text-blue-700 rounded text-xs font-medium hover:bg-blue-50 transition-colors"><Pencil size={11} /> Edit</button>
                      <button onClick={() => toggleStatus(l.id)} className="flex items-center gap-1 px-2.5 py-1.5 border border-blue-200 text-blue-600 rounded text-xs font-medium hover:bg-blue-50 transition-colors"><Eye size={11} /> {l.status === "Aktif" ? "Nonaktifkan" : "Aktifkan"}</button>
                      <button onClick={() => hapus(l.id)} className="flex items-center gap-1 px-2.5 py-1.5 bg-blue-900 text-white rounded text-xs font-medium hover:bg-blue-700 transition-colors"><Trash2 size={11} /> Hapus</button>
                    </div>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

/* ─── Admin: Kelola Armada ─── */
function AdminArmada() {
  const [armada, setArmada] = useState<Armada[]>(SEED_ARMADA);
  const [editId, setEditId] = useState<number | null>(null);
  const [form, setForm] = useState<Omit<Armada, "id">>({ nomorKendaraan: "", tipe: "Truk Besar", kapasitas: "", status: "Tersedia", driver: "" });

  const reset = () => { setEditId(null); setForm({ nomorKendaraan: "", tipe: "Truk Besar", kapasitas: "", status: "Tersedia", driver: "" }); };
  const simpan = () => {
    if (!form.nomorKendaraan.trim()) return;
    if (editId !== null) {
      setArmada(prev => prev.map(a => a.id === editId ? { ...a, ...form } : a));
    } else {
      setArmada(prev => [...prev, { id: Date.now(), ...form }]);
    }
    reset();
  };
  const mulaiEdit = (a: Armada) => { setEditId(a.id); setForm({ nomorKendaraan: a.nomorKendaraan, tipe: a.tipe, kapasitas: a.kapasitas, status: a.status, driver: a.driver }); };
  const hapus = (id: number) => setArmada(prev => prev.filter(a => a.id !== id));

  return (
    <div className="space-y-8">
      <div className="bg-blue-50 border border-blue-200 rounded-xl p-6">
        <h4 className="font-display font-semibold text-blue-900 mb-4">{editId !== null ? "Edit Data Armada" : "Tambah Kendaraan Baru"}</h4>
        <div className="grid md:grid-cols-2 gap-4">
          {([
            { key: "nomorKendaraan", label: "Nomor Kendaraan", placeholder: "cth. B 1234 IBN" },
            { key: "kapasitas", label: "Kapasitas", placeholder: "cth. 10 Ton" },
            { key: "driver", label: "Nama Driver", placeholder: "cth. Ahmad Fauzi" },
          ] as const).map(({ key, label, placeholder }) => (
            <div key={key}>
              <label className="block text-xs font-medium text-blue-700 mb-1.5">{label}</label>
              <input value={form[key]} onChange={e => setForm({ ...form, [key]: e.target.value })}
                placeholder={placeholder}
                className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white" />
            </div>
          ))}
          <div>
            <label className="block text-xs font-medium text-blue-700 mb-1.5">Tipe Kendaraan</label>
            <select value={form.tipe} onChange={e => setForm({ ...form, tipe: e.target.value })}
              className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white">
              {["Truk Besar", "Truk Sedang", "Van Kargo", "Motor Kurir"].map(o => <option key={o}>{o}</option>)}
            </select>
          </div>
          <div>
            <label className="block text-xs font-medium text-blue-700 mb-1.5">Status</label>
            <select value={form.status} onChange={e => setForm({ ...form, status: e.target.value as Armada["status"] })}
              className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white">
              <option>Tersedia</option><option>Beroperasi</option><option>Servis</option>
            </select>
          </div>
        </div>
        <div className="mt-4 flex gap-3">
          <button onClick={simpan} className="flex items-center gap-2 px-5 py-2 bg-blue-900 text-white text-sm font-semibold rounded-md hover:bg-blue-800 transition-colors">
            <Save size={14} /> {editId !== null ? "Perbarui" : "Simpan Kendaraan"}
          </button>
          {editId !== null && <button onClick={reset} className="px-5 py-2 border border-blue-300 text-blue-700 text-sm font-semibold rounded-md hover:bg-blue-50">Batal</button>}
        </div>
      </div>

      <div>
        <h4 className="font-display font-semibold text-blue-900 mb-3">Daftar Armada ({armada.length} kendaraan)</h4>
        <div className="border border-blue-200 rounded-xl overflow-hidden">
          <table className="w-full text-sm">
            <thead className="bg-blue-900 text-white">
              <tr>{["Nomor Kendaraan", "Tipe", "Kapasitas", "Driver", "Status", "Aksi"].map(h => <th key={h} className="px-4 py-3 text-left font-semibold text-xs">{h}</th>)}</tr>
            </thead>
            <tbody className="divide-y divide-blue-100">
              {armada.map((a, i) => (
                <tr key={a.id} className={i % 2 === 0 ? "bg-white" : "bg-blue-50/40"}>
                  <td className="px-4 py-3 font-mono text-xs font-medium text-blue-900">{a.nomorKendaraan}</td>
                  <td className="px-4 py-3 text-blue-700">{a.tipe}</td>
                  <td className="px-4 py-3 text-blue-700">{a.kapasitas}</td>
                  <td className="px-4 py-3 text-blue-900">{a.driver}</td>
                  <td className="px-4 py-3"><StatusBadge status={a.status} /></td>
                  <td className="px-4 py-3">
                    <div className="flex gap-2">
                      <button onClick={() => mulaiEdit(a)} className="flex items-center gap-1 px-2.5 py-1.5 border border-blue-300 text-blue-700 rounded text-xs font-medium hover:bg-blue-50"><Pencil size={11} /> Edit</button>
                      <button onClick={() => hapus(a.id)} className="flex items-center gap-1 px-2.5 py-1.5 bg-blue-900 text-white rounded text-xs font-medium hover:bg-blue-700"><Trash2 size={11} /> Hapus</button>
                    </div>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

/* ─── Admin: Data Pengiriman ─── */
function AdminPengiriman() {
  const [list, setList] = useState<Pengiriman[]>(SEED_PENGIRIMAN);
  const [form, setForm] = useState<Omit<Pengiriman, "id">>({ pelanggan: "", tujuan: "", layanan: "Angkutan Darat", status: "Tertunda", tanggal: "" });
  const [editId, setEditId] = useState<string | null>(null);

  const reset = () => { setEditId(null); setForm({ pelanggan: "", tujuan: "", layanan: "Angkutan Darat", status: "Tertunda", tanggal: "" }); };
  const simpan = () => {
    if (!form.pelanggan.trim()) return;
    if (editId !== null) {
      setList(prev => prev.map(p => p.id === editId ? { ...p, ...form } : p));
    } else {
      const newId = `IBN-2026-${String(list.length + 1).padStart(3, "0")}`;
      setList(prev => [...prev, { id: newId, ...form }]);
    }
    reset();
  };
  const mulaiEdit = (p: Pengiriman) => { setEditId(p.id); setForm({ pelanggan: p.pelanggan, tujuan: p.tujuan, layanan: p.layanan, status: p.status, tanggal: p.tanggal }); };
  const hapus = (id: string) => setList(prev => prev.filter(p => p.id !== id));

  return (
    <div className="space-y-8">
      <div className="bg-blue-50 border border-blue-200 rounded-xl p-6">
        <h4 className="font-display font-semibold text-blue-900 mb-4">{editId ? "Edit Data Pengiriman" : "Tambah Pengiriman Baru"}</h4>
        <div className="grid md:grid-cols-2 gap-4">
          {([{ key: "pelanggan", label: "Nama Pelanggan", placeholder: "cth. PT Maju Bersama" }, { key: "tujuan", label: "Kota Tujuan", placeholder: "cth. Surabaya" }] as const).map(({ key, label, placeholder }) => (
            <div key={key}>
              <label className="block text-xs font-medium text-blue-700 mb-1.5">{label}</label>
              <input value={form[key]} onChange={e => setForm({ ...form, [key]: e.target.value })} placeholder={placeholder}
                className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white" />
            </div>
          ))}
          <div>
            <label className="block text-xs font-medium text-blue-700 mb-1.5">Layanan</label>
            <select value={form.layanan} onChange={e => setForm({ ...form, layanan: e.target.value })}
              className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white">
              {["Angkutan Darat", "Kargo Udara", "Pergudangan"].map(o => <option key={o}>{o}</option>)}
            </select>
          </div>
          <div>
            <label className="block text-xs font-medium text-blue-700 mb-1.5">Status</label>
            <select value={form.status} onChange={e => setForm({ ...form, status: e.target.value as Pengiriman["status"] })}
              className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white">
              <option>Tertunda</option><option>Dalam Proses</option><option>Selesai</option>
            </select>
          </div>
          <div>
            <label className="block text-xs font-medium text-blue-700 mb-1.5">Tanggal</label>
            <input type="date" value={form.tanggal} onChange={e => setForm({ ...form, tanggal: e.target.value })}
              className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white" />
          </div>
        </div>
        <div className="mt-4 flex gap-3">
          <button onClick={simpan} className="flex items-center gap-2 px-5 py-2 bg-blue-900 text-white text-sm font-semibold rounded-md hover:bg-blue-800"><Save size={14} /> {editId ? "Perbarui" : "Simpan"}</button>
          {editId && <button onClick={reset} className="px-5 py-2 border border-blue-300 text-blue-700 text-sm font-semibold rounded-md hover:bg-blue-50">Batal</button>}
        </div>
      </div>

      <div>
        <h4 className="font-display font-semibold text-blue-900 mb-3">Riwayat Pengiriman ({list.length} entri)</h4>
        <div className="border border-blue-200 rounded-xl overflow-hidden overflow-x-auto">
          <table className="w-full text-sm min-w-[640px]">
            <thead className="bg-blue-900 text-white">
              <tr>{["ID Kiriman", "Pelanggan", "Tujuan", "Layanan", "Status", "Tanggal", "Aksi"].map(h => <th key={h} className="px-4 py-3 text-left font-semibold text-xs">{h}</th>)}</tr>
            </thead>
            <tbody className="divide-y divide-blue-100">
              {list.map((p, i) => (
                <tr key={p.id} className={i % 2 === 0 ? "bg-white" : "bg-blue-50/40"}>
                  <td className="px-4 py-3 font-mono text-xs text-blue-500">{p.id}</td>
                  <td className="px-4 py-3 text-blue-900 font-medium">{p.pelanggan}</td>
                  <td className="px-4 py-3 text-blue-700">{p.tujuan}</td>
                  <td className="px-4 py-3 text-blue-700">{p.layanan}</td>
                  <td className="px-4 py-3"><StatusBadge status={p.status} /></td>
                  <td className="px-4 py-3 text-blue-600 text-xs">{p.tanggal}</td>
                  <td className="px-4 py-3">
                    <div className="flex gap-2">
                      <button onClick={() => mulaiEdit(p)} className="flex items-center gap-1 px-2.5 py-1.5 border border-blue-300 text-blue-700 rounded text-xs hover:bg-blue-50"><Pencil size={11} /> Edit</button>
                      <button onClick={() => hapus(p.id)} className="flex items-center gap-1 px-2.5 py-1.5 bg-blue-900 text-white rounded text-xs hover:bg-blue-700"><Trash2 size={11} /> Hapus</button>
                    </div>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

/* ─── Admin: Kelola Tim ─── */
function AdminTim() {
  const [tim, setTim] = useState<AnggotaTim[]>(SEED_TIM);
  const [form, setForm] = useState<Omit<AnggotaTim, "id">>({ nama: "", jabatan: "", email: "", status: "Aktif" });
  const [editId, setEditId] = useState<number | null>(null);

  const reset = () => { setEditId(null); setForm({ nama: "", jabatan: "", email: "", status: "Aktif" }); };
  const simpan = () => {
    if (!form.nama.trim()) return;
    if (editId !== null) {
      setTim(prev => prev.map(t => t.id === editId ? { ...t, ...form } : t));
    } else {
      setTim(prev => [...prev, { id: Date.now(), ...form }]);
    }
    reset();
  };
  const mulaiEdit = (t: AnggotaTim) => { setEditId(t.id); setForm({ nama: t.nama, jabatan: t.jabatan, email: t.email, status: t.status }); };
  const hapus = (id: number) => setTim(prev => prev.filter(t => t.id !== id));

  return (
    <div className="space-y-8">
      <div className="bg-blue-50 border border-blue-200 rounded-xl p-6">
        <h4 className="font-display font-semibold text-blue-900 mb-4">{editId !== null ? "Edit Anggota Tim" : "Tambah Anggota Tim"}</h4>
        <div className="grid md:grid-cols-2 gap-4">
          {([{ key: "nama", label: "Nama Lengkap", placeholder: "cth. Siti Rahayu" }, { key: "jabatan", label: "Jabatan", placeholder: "cth. Manajer Operasional" }, { key: "email", label: "Email", placeholder: "cth. siti@ibenlogistic.co.id" }] as const).map(({ key, label, placeholder }) => (
            <div key={key}>
              <label className="block text-xs font-medium text-blue-700 mb-1.5">{label}</label>
              <input value={form[key]} onChange={e => setForm({ ...form, [key]: e.target.value })} placeholder={placeholder}
                className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white" />
            </div>
          ))}
          <div>
            <label className="block text-xs font-medium text-blue-700 mb-1.5">Status</label>
            <select value={form.status} onChange={e => setForm({ ...form, status: e.target.value as "Aktif" | "Cuti" })}
              className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white">
              <option>Aktif</option><option>Cuti</option>
            </select>
          </div>
        </div>
        <div className="mt-4 flex gap-3">
          <button onClick={simpan} className="flex items-center gap-2 px-5 py-2 bg-blue-900 text-white text-sm font-semibold rounded-md hover:bg-blue-800"><Save size={14} /> {editId !== null ? "Perbarui" : "Simpan Anggota"}</button>
          {editId !== null && <button onClick={reset} className="px-5 py-2 border border-blue-300 text-blue-700 text-sm font-semibold rounded-md hover:bg-blue-50">Batal</button>}
        </div>
      </div>

      <div className="grid md:grid-cols-2 gap-4">
        {tim.map(t => (
          <div key={t.id} className="bg-white border border-blue-100 rounded-xl p-5 shadow-sm flex items-start gap-4">
            <div className="w-12 h-12 rounded-full bg-blue-200 flex items-center justify-center shrink-0">
              <span className="font-display font-bold text-blue-900 text-sm">
                {t.nama.split(" ").map(n => n[0]).slice(0, 2).join("")}
              </span>
            </div>
            <div className="flex-1 min-w-0">
              <div className="flex items-center gap-2 flex-wrap">
                <p className="font-semibold text-blue-900">{t.nama}</p>
                <StatusBadge status={t.status} />
              </div>
              <p className="text-xs text-blue-600 mt-0.5">{t.jabatan}</p>
              <p className="text-xs text-blue-400 mt-0.5">{t.email}</p>
            </div>
            <div className="flex flex-col gap-2 shrink-0">
              <button onClick={() => mulaiEdit(t)} className="flex items-center gap-1 px-2.5 py-1.5 border border-blue-300 text-blue-700 rounded text-xs hover:bg-blue-50"><Pencil size={11} /> Edit</button>
              <button onClick={() => hapus(t.id)} className="flex items-center gap-1 px-2.5 py-1.5 bg-blue-900 text-white rounded text-xs hover:bg-blue-700"><Trash2 size={11} /> Hapus</button>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}

/* ─── Admin: Pengaturan ─── */
function AdminPengaturan() {
  const [profil, setProfil] = useState({ nama: "Ibnu Anjang", email: "ibnu@ibenlogistic.co.id", telepon: "+62 21 8800 4400", alamat: "Jl. Logistik Utama No. 12, Jakarta Timur" });
  const [perusahaan, setPerusahaan] = useState({ nama: "Iben Logistic", tagline: "Aman, Cepat, dan Terpercaya", tahunBerdiri: "2014", website: "www.ibenlogistic.co.id" });
  const [notifEmail, setNotifEmail] = useState(true);
  const [notifWA, setNotifWA] = useState(false);
  const [saved, setSaved] = useState(false);

  const simpan = () => { setSaved(true); setTimeout(() => setSaved(false), 2500); };

  return (
    <div className="space-y-8 max-w-2xl">
      {saved && (
        <div className="flex items-center gap-3 bg-blue-50 border border-blue-300 rounded-lg px-4 py-3 text-sm text-blue-900 font-medium">
          <CheckCircle size={16} className="text-blue-700" /> Pengaturan berhasil disimpan.
        </div>
      )}

      {/* Profil Admin */}
      <div className="bg-blue-50 border border-blue-200 rounded-xl p-6">
        <div className="flex items-center gap-3 mb-5">
          <ShieldCheck size={18} className="text-blue-900" />
          <h4 className="font-display font-semibold text-blue-900">Profil Administrator</h4>
        </div>
        <div className="flex items-center gap-4 mb-5">
          <div className="w-16 h-16 rounded-full bg-blue-200 flex items-center justify-center">
            <span className="font-display font-bold text-blue-900 text-xl">IA</span>
          </div>
          <div>
            <button className="text-xs font-medium text-blue-700 border border-blue-300 px-3 py-1.5 rounded-md hover:bg-blue-100 transition-colors">Ganti Foto</button>
            <p className="text-xs text-blue-400 mt-1">JPG, PNG, maks. 2MB</p>
          </div>
        </div>
        <div className="grid md:grid-cols-2 gap-4">
          {([{ key: "nama", label: "Nama Lengkap" }, { key: "email", label: "Email" }, { key: "telepon", label: "Telepon" }, { key: "alamat", label: "Alamat" }] as const).map(({ key, label }) => (
            <div key={key} className={key === "alamat" ? "md:col-span-2" : ""}>
              <label className="block text-xs font-medium text-blue-700 mb-1.5">{label}</label>
              <input value={profil[key]} onChange={e => setProfil({ ...profil, [key]: e.target.value })}
                className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white" />
            </div>
          ))}
        </div>
      </div>

      {/* Info Perusahaan */}
      <div className="bg-blue-50 border border-blue-200 rounded-xl p-6">
        <div className="flex items-center gap-3 mb-5">
          <Star size={18} className="text-blue-900" />
          <h4 className="font-display font-semibold text-blue-900">Informasi Perusahaan</h4>
        </div>
        <div className="grid md:grid-cols-2 gap-4">
          {([{ key: "nama", label: "Nama Perusahaan" }, { key: "tagline", label: "Tagline" }, { key: "tahunBerdiri", label: "Tahun Berdiri" }, { key: "website", label: "Website" }] as const).map(({ key, label }) => (
            <div key={key}>
              <label className="block text-xs font-medium text-blue-700 mb-1.5">{label}</label>
              <input value={perusahaan[key]} onChange={e => setPerusahaan({ ...perusahaan, [key]: e.target.value })}
                className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white" />
            </div>
          ))}
        </div>
      </div>

      {/* Notifikasi */}
      <div className="bg-blue-50 border border-blue-200 rounded-xl p-6">
        <div className="flex items-center gap-3 mb-5">
          <Bell size={18} className="text-blue-900" />
          <h4 className="font-display font-semibold text-blue-900">Preferensi Notifikasi</h4>
        </div>
        <div className="space-y-4">
          {[
            { label: "Notifikasi Email", sub: "Terima notifikasi pesanan via email", val: notifEmail, set: setNotifEmail },
            { label: "Notifikasi WhatsApp", sub: "Terima notifikasi pesanan via WhatsApp", val: notifWA, set: setNotifWA },
          ].map(({ label, sub, val, set }) => (
            <div key={label} className="flex items-center justify-between">
              <div>
                <p className="text-sm font-medium text-blue-900">{label}</p>
                <p className="text-xs text-blue-500">{sub}</p>
              </div>
              <button
                onClick={() => set(!val)}
                className={`w-11 h-6 rounded-full transition-colors relative ${val ? "bg-blue-900" : "bg-blue-200"}`}
              >
                <span className={`absolute top-0.5 left-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform ${val ? "translate-x-5" : ""}`} />
              </button>
            </div>
          ))}
        </div>
      </div>

      {/* Ubah Kata Sandi */}
      <div className="bg-blue-50 border border-blue-200 rounded-xl p-6">
        <div className="flex items-center gap-3 mb-5">
          <User size={18} className="text-blue-900" />
          <h4 className="font-display font-semibold text-blue-900">Ubah Kata Sandi</h4>
        </div>
        <div className="space-y-4">
          {["Kata Sandi Saat Ini", "Kata Sandi Baru", "Konfirmasi Kata Sandi Baru"].map(label => (
            <div key={label}>
              <label className="block text-xs font-medium text-blue-700 mb-1.5">{label}</label>
              <input type="password" placeholder="••••••••"
                className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-700 bg-white" />
            </div>
          ))}
        </div>
      </div>

      <button onClick={simpan} className="flex items-center gap-2 px-6 py-3 bg-blue-900 text-white font-semibold rounded-md hover:bg-blue-800 transition-colors text-sm">
        <Save size={15} /> Simpan Semua Perubahan
      </button>
    </div>
  );
}

/* ═══════════════════════════════════════════
   ROOT APP
═══════════════════════════════════════════ */
export default function App() {
  const [menuOpen, setMenuOpen] = useState(false);
  const [activeAdmin, setActiveAdmin] = useState("Dasbor");

  /* shared state passed to Dasbor */
  const [layanan] = useState(SEED_LAYANAN);
  const [armada]  = useState(SEED_ARMADA);
  const [pengiriman] = useState(SEED_PENGIRIMAN);
  const [tim] = useState(SEED_TIM);

  const renderAdminContent = () => {
    switch (activeAdmin) {
      case "Dasbor":          return <AdminDasbor layanan={layanan} armada={armada} pengiriman={pengiriman} tim={tim} />;
      case "Kelola Layanan":  return <AdminLayanan />;
      case "Kelola Armada":   return <AdminArmada />;
      case "Data Pengiriman": return <AdminPengiriman />;
      case "Kelola Tim":      return <AdminTim />;
      case "Pengaturan":      return <AdminPengaturan />;
      default:                return null;
    }
  };

  return (
    <div className="min-h-full bg-white text-blue-900">

      {/* ─── NAVIGASI ─── */}
      <header className="sticky top-0 z-50 bg-white border-b border-blue-100">
        <div className="max-w-7xl mx-auto px-6 h-16 flex items-center justify-between gap-8">
          <span className="font-display text-2xl font-bold text-blue-900 shrink-0">Iben Logistic</span>

          <nav className="hidden md:flex items-center gap-7">
            {NAV_LINKS.map((link, i) => (
              <a key={link} href={`#${NAV_IDS[i]}`}
                className="text-sm font-medium text-blue-900 hover:text-blue-600 transition-colors">
                {link}
              </a>
            ))}
          </nav>

          <div className="flex items-center gap-3">
            <button className="md:hidden p-2 text-blue-900" onClick={() => setMenuOpen(!menuOpen)}>
              {menuOpen ? <X size={22} /> : <Menu size={22} />}
            </button>
          </div>
        </div>

        {menuOpen && (
          <div className="md:hidden border-t border-blue-100 bg-white px-6 py-4 flex flex-col gap-4">
            {NAV_LINKS.map((link, i) => (
              <a key={link} href={`#${NAV_IDS[i]}`} className="text-sm font-medium text-blue-900" onClick={() => setMenuOpen(false)}>{link}</a>
            ))}
            <a href="#contact" className="inline-flex justify-center items-center gap-2 px-4 py-2 bg-blue-900 text-white text-sm font-semibold rounded-md" onClick={() => setMenuOpen(false)}>
              Hubungi Kami
            </a>
          </div>
        )}
      </header>

      {/* ─── HERO ─── */}
      <section id="home" className="bg-blue-900 py-24 px-6">
        <div className="max-w-7xl mx-auto grid md:grid-cols-2 gap-16 items-center">
          <div>
            <p className="text-blue-300 text-xs font-semibold uppercase tracking-widest mb-4">Mitra Logistik Terpercaya</p>
            <h1 className="font-display text-5xl font-bold text-white leading-tight">
              Solusi Logistik yang Aman, Cepat, dan Terpercaya.
            </h1>
            <p className="mt-5 text-blue-200 text-lg leading-relaxed">
              Mitra terpercaya Anda untuk layanan kargo dan pengiriman di seluruh wilayah — tepat waktu, setiap saat.
            </p>
            <div className="mt-8 flex flex-wrap gap-4">
              <a href="#services" className="px-6 py-3 bg-white text-blue-900 font-semibold rounded-md hover:bg-blue-50 transition-colors text-sm">Layanan Kami</a>
              <a href="#contact" className="px-6 py-3 border border-white text-white font-semibold rounded-md hover:bg-white/10 transition-colors text-sm">Hubungi Kami</a>
            </div>
          </div>
          <div className="flex items-center justify-center">
            <div className="relative">
              <div className="w-56 h-56 rounded-full bg-blue-800/50 flex items-center justify-center">
                <Globe size={160} className="text-white/20" strokeWidth={0.8} />
              </div>
              <div className="absolute -bottom-4 -right-4 w-24 h-24 rounded-full bg-blue-700/40 flex items-center justify-center">
                <Truck size={48} className="text-white/30" strokeWidth={0.8} />
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* ─── TENTANG ─── */}
      <section id="about" className="py-20 px-6 bg-white">
        <div className="max-w-7xl mx-auto">
          <h2 className="font-display text-3xl font-bold text-blue-900 text-center mb-14">Tentang Iben Logistic</h2>
          <div className="grid md:grid-cols-2 gap-16 items-start">
            <div className="space-y-5 text-blue-900/80 leading-relaxed">
              <p>
                Didirikan pada tahun 2014, <strong className="text-blue-900">Iben Logistic</strong> telah berkembang menjadi salah satu perusahaan kargo dan pengiriman paling terpercaya di kawasan ini. Kami mengkhususkan diri dalam manajemen rantai pasok dari ujung ke ujung, menggabungkan pelacakan berbasis teknologi dengan penanganan profesional untuk memastikan setiap kiriman tiba dengan aman dan tepat waktu.
              </p>
              <p>
                Tim profesional logistik kami berkomitmen pada transparansi, ketepatan waktu, dan layanan yang dipersonalisasi. Baik Anda membutuhkan angkutan darat lintas negeri, kargo udara lintas benua, atau pergudangan aman dekat pelabuhan utama, Iben Logistic memiliki armada, infrastruktur, dan keahlian untuk melakukannya.
              </p>
              <p>
                Kami beroperasi di bawah standar kualitas yang ketat dan menjaga kemitraan erat dengan otoritas bea cukai, pengelola pelabuhan, dan freight forwarder untuk menjaga rantai pasokan Anda tetap berjalan lancar.
              </p>
            </div>
            <div className="grid grid-cols-1 gap-5">
              {[
                { value: "10+", label: "Tahun Pengalaman" },
                { value: "99%", label: "Tingkat Ketepatan Waktu" },
                { value: "50+", label: "Armada Kendaraan" },
              ].map((stat) => (
                <div key={stat.label} className="border border-blue-200 rounded-lg p-6 flex items-center gap-6">
                  <span className="font-display text-4xl font-bold text-blue-900">{stat.value}</span>
                  <span className="text-blue-700 font-medium text-lg">{stat.label}</span>
                </div>
              ))}
            </div>
          </div>
        </div>
      </section>

      {/* ─── LAYANAN ─── */}
      <section id="services" className="py-20 px-6 bg-blue-50">
        <div className="max-w-7xl mx-auto">
          <h2 className="font-display text-3xl font-bold text-blue-900 text-center mb-3">Layanan Kami</h2>
          <p className="text-center text-blue-700/70 mb-14 text-sm">Solusi logistik lengkap yang disesuaikan untuk bisnis Anda.</p>
          <div className="grid md:grid-cols-3 gap-7">
            {[
              { Icon: Truck,   judul: "Angkutan Darat",  desc: "Transportasi jalan raya yang aman dan efisien untuk semua jenis kargo." },
              { Icon: Plane,   judul: "Kargo Udara",     desc: "Solusi pengiriman ekspres untuk kiriman sensitif waktu." },
              { Icon: Package, judul: "Pergudangan",     desc: "Fasilitas penyimpanan aman dengan pemantauan 24 jam dan manajemen inventaris." },
            ].map(({ Icon, judul, desc }) => (
              <div key={judul} className="bg-white rounded-lg shadow-lg p-7 flex flex-col gap-4 hover:shadow-xl transition-shadow border border-blue-50">
                <div className="w-12 h-12 bg-blue-900 rounded-md flex items-center justify-center">
                  <Icon size={24} className="text-white" />
                </div>
                <h3 className="font-display text-xl font-semibold text-blue-900">{judul}</h3>
                <p className="text-blue-800/70 text-sm leading-relaxed">{desc}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* ─── GALERI ─── */}
      <section id="gallery" className="py-20 px-6 bg-white">
        <div className="max-w-7xl mx-auto">
          <h2 className="font-display text-3xl font-bold text-blue-900 text-center mb-3">Armada & Fasilitas Kami</h2>
          <p className="text-center text-blue-700/70 mb-14 text-sm">Armada modern yang dirawat dengan standar operasional tertinggi.</p>
          <div className="grid grid-cols-2 md:grid-cols-3 gap-5">
            {["Armada Truk Berat", "Terminal Kargo Udara", "Interior Gudang", "Unit Penyimpanan Dingin", "Dermaga Muat Pelabuhan", "Pusat Perawatan Armada"].map(label => (
              <div key={label} className="bg-blue-100 rounded-md h-48 flex flex-col items-center justify-center gap-3 hover:bg-blue-200/60 transition-colors">
                <Camera size={32} className="text-blue-500" />
                <span className="text-blue-700 text-xs font-medium text-center px-4">{label}</span>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* ─── TIM ─── */}
      <section id="team" className="py-20 px-6 bg-blue-50">
        <div className="max-w-7xl mx-auto">
          <h2 className="font-display text-3xl font-bold text-blue-900 text-center mb-14">Kenali Pemimpin Kami</h2>
          <div className="flex justify-center">
            <div className="bg-white shadow-md rounded-xl p-8 flex flex-col items-center gap-4 w-72 border border-blue-100">
              <div className="w-24 h-24 rounded-full bg-blue-200 flex items-center justify-center">
                <span className="font-display text-3xl font-bold text-blue-900">IA</span>
              </div>
              <div className="text-center">
                <p className="font-display text-xl font-semibold text-blue-900">Ibnu Anjang</p>
                <p className="text-blue-600 text-sm mt-1">Founder & CEO</p>
              </div>
              <p className="text-center text-blue-800/70 text-xs leading-relaxed">
                Dengan pengalaman lebih dari satu dekade di bidang logistik regional, Ibnu mendirikan Iben Logistic dengan misi menghadirkan keunggulan di setiap pengiriman.
              </p>
            </div>
          </div>
        </div>
      </section>

      {/* ─── KONTAK ─── */}
      <section id="contact" className="py-20 px-6 bg-white">
        <div className="max-w-7xl mx-auto">
          <h2 className="font-display text-3xl font-bold text-blue-900 text-center mb-14">Hubungi Kami</h2>
          <div className="grid md:grid-cols-2 gap-16">
            <div className="space-y-8">
              <div className="space-y-5">
                {[
                  { Icon: MapPin, label: "Jl. Logistik Utama No. 12, Jakarta Timur, Indonesia 13220" },
                  { Icon: Phone, label: "+62 21 8800 4400" },
                  { Icon: Mail,  label: "hello@ibenlogistic.co.id" },
                ].map(({ Icon, label }) => (
                  <div key={label} className="flex items-start gap-4">
                    <div className="w-9 h-9 bg-blue-900 rounded-md flex items-center justify-center shrink-0">
                      <Icon size={16} className="text-white" />
                    </div>
                    <span className="text-blue-800 text-sm leading-relaxed pt-1.5">{label}</span>
                  </div>
                ))}
              </div>
              <div className="bg-blue-50 border border-blue-200 rounded-lg h-52 flex items-center justify-center">
                <span className="text-blue-400 text-sm font-medium">Peta Google Maps</span>
              </div>
            </div>
            <div>
              <form className="space-y-5" onSubmit={e => e.preventDefault()}>
                {[
                  { label: "Nama", type: "text", placeholder: "Nama lengkap Anda" },
                  { label: "Email", type: "email", placeholder: "anda@email.com" },
                ].map(({ label, type, placeholder }) => (
                  <div key={label}>
                    <label className="block text-sm font-medium text-blue-900 mb-1.5">{label}</label>
                    <input type={type} placeholder={placeholder}
                      className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-700 transition" />
                  </div>
                ))}
                <div>
                  <label className="block text-sm font-medium text-blue-900 mb-1.5">Pesan</label>
                  <textarea rows={5} placeholder="Ceritakan tentang kebutuhan pengiriman atau pertanyaan Anda..."
                    className="w-full border border-blue-200 rounded-md px-4 py-2.5 text-sm text-blue-900 placeholder-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-700 transition resize-none" />
                </div>
                <button type="submit" className="w-full py-3 bg-blue-900 text-white font-semibold rounded-md hover:bg-blue-800 transition-colors text-sm">
                  Kirim Pesan
                </button>
              </form>
            </div>
          </div>
        </div>
      </section>

      {/* ─── FOOTER ─── */}
      <footer className="bg-blue-900 py-8 px-6 text-center">
        <p className="text-white/80 text-sm">© 2026 Iben Logistic. Seluruh hak cipta dilindungi undang-undang.</p>
      </footer>

      {/* ═══════════════════════════════════════════
          PANEL ADMIN
      ═══════════════════════════════════════════ */}
      <div id="admin-panel" className="border-4 border-blue-900 m-6 rounded-xl overflow-hidden">
        {/* Admin topbar */}
        <div className="bg-blue-900 px-6 py-4 flex items-center justify-between">
          <div>
            <h2 className="font-display text-xl font-bold text-white">PANEL ADMIN — Iben Logistic</h2>
            <p className="text-blue-300 text-xs mt-0.5">Sistem manajemen internal</p>
          </div>
          <div className="flex items-center gap-3">
            <button className="relative p-2 text-blue-300 hover:text-white transition-colors">
              <Bell size={18} />
              <span className="absolute top-1 right-1 w-2 h-2 bg-white rounded-full" />
            </button>
            <div className="flex items-center gap-2 text-white text-sm font-medium">
              <div className="w-8 h-8 rounded-full bg-blue-700 flex items-center justify-center">
                <span className="text-xs font-bold">IA</span>
              </div>
              <span className="hidden sm:block">Ibnu Anjang</span>
            </div>
            <button className="p-2 text-blue-300 hover:text-white transition-colors">
              <LogOut size={16} />
            </button>
          </div>
        </div>

        <div className="flex flex-col md:flex-row min-h-[700px]">
          {/* Sidebar */}
          <aside className="w-full md:w-60 bg-blue-50 border-r border-blue-200 p-4 shrink-0">
            <p className="text-xs font-semibold text-blue-400 uppercase tracking-widest px-3 mb-3">Menu</p>
            <nav className="space-y-1">
              {MENU_ADMIN.map(({ label, Icon }) => (
                <button key={label} onClick={() => setActiveAdmin(label)}
                  className={`w-full flex items-center gap-3 px-3 py-2.5 rounded-md text-sm font-medium transition-colors ${
                    activeAdmin === label ? "bg-blue-900 text-white" : "text-blue-900 hover:bg-blue-100"
                  }`}>
                  <Icon size={16} />
                  <span className="flex-1 text-left">{label}</span>
                  {activeAdmin === label && <ChevronRight size={14} />}
                </button>
              ))}
            </nav>

            <div className="mt-8 px-3">
              <div className="bg-blue-900 rounded-lg p-4 text-white text-center">
                <Boxes size={24} className="mx-auto mb-2 opacity-80" />
                <p className="text-xs font-semibold">Versi Sistem</p>
                <p className="text-xs text-blue-300 mt-0.5">v2.4.1 — Sept 2026</p>
              </div>
            </div>
          </aside>

          {/* Konten Utama */}
          <main className="flex-1 p-6 bg-white overflow-auto">
            <div className="flex items-center gap-2 text-xs text-blue-400 mb-6">
              <span>Admin</span>
              <ChevronRight size={12} />
              <span className="text-blue-900 font-medium">{activeAdmin}</span>
            </div>
            <h3 className="font-display text-2xl font-bold text-blue-900 mb-6">{activeAdmin}</h3>
            {renderAdminContent()}
          </main>
        </div>
      </div>
    </div>
  );
}
