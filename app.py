import os
from flask import Flask, render_template, request, redirect, url_for

app = Flask(__name__)

# Konfigurasi folder penyimpanan
UPLOAD_FOLDER = 'uploads'
app.config['UPLOAD_FOLDER'] = UPLOAD_FOLDER

# Pastikan folder uploads ada
if not os.path.exists(UPLOAD_FOLDER):
    os.makedirs(UPLOAD_FOLDER)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/', methods=['POST'])
def upload_file():
    if 'file' not in request.files:
        return 'Tidak ada file yang dipilih'
    
    file = request.files['file']
    
    if file.filename == '':
        return 'Nama file kosong'
    
    if file:
        # Menyimpan file ke folder uploads di laptop
        filepath = os.path.join(app.config['UPLOAD_FOLDER'], file.filename)
        file.save(filepath)
        return f'Sukses! File "{file.filename}" berhasil disimpan di laptop.'

if __name__ == '__main__':
    # host='0.0.0.0' agar bisa diakses dari HP/perangkat lain di WiFi yang sama
    app.run(debug=True, host='0.0.0.0', port=5000)