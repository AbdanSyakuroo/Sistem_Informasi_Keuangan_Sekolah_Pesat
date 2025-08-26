<form action="{{ route('penerimaan-sumber-dana.store') }}" method="POST">
    @csrf
    <label>Sumber Dana</label>
    <select name="sumber_dana_id" required>
        @foreach($sumberDanas as $sd)
            <option value="{{ $sd->id }}">{{ $sd->nama_sumber }}</option>
        @endforeach
    </select>

    <label>Tanggal</label>
    <input type="date" name="tanggal" required>

    <label>Uraian</label>
    <input type="text" name="uraian">

    <label>Nominal</label>
    <input type="number" name="nominal" required>

    <button type="submit">Simpan</button>
</form>
