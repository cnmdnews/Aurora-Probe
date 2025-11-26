<!DOCTYPE html>
<html lang="zh-CN" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurora Probe - cnmdnews</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh; }
        .glass { background: rgba(255,255,255,0.1); backdrop-filter: blur(12px); border: 1px solid rgba(255,255,255,0.2); }
    </style>
</head>
<body class="text-white">
<div class="container mx-auto p-6 max-w-6xl">
    <div class="text-center my-10">
        <h1 class="text-5xl font-bold mb-2">🌌 Aurora Probe</h1>
        <p class="text-xl opacity-90">cnmdnews 专属版 · 实时服务器监控</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8" id="cards"></div>

    <div class="glass rounded-2xl p-8 text-center">
        <h2 class="text-2xl mb-4"><i class="ri-speed-line"></i> 全球测速 (开发中)</h2>
        <button class="bg-white text-purple-700 px-8 py-4 rounded-full font-bold hover:scale-105 transition">开始测速</button>
    </div>
</div>

<script>
async function update() {
    const r = await fetch('status.php');
    const d = await r.json();
    document.getElementById('cards').innerHTML = `
        <div class="glass rounded-2xl p-6"><h3 class="text-lg opacity-80">CPU 负载</h3><p class="text-4xl font-mono">${d.cpu}</p></div>
        <div class="glass rounded-2xl p-6"><h3 class="text-lg opacity-80">内存使用</h3><p class="text-4xl font-mono">${d.mem}</p></div>
        <div class="glass rounded-2xl p-6"><h3 class="text-lg opacity-80">磁盘可用</h3><p class="text-4xl font-mono">${d.disk}</p></div>
        <div class="glass rounded-2xl p-6"><h3 class="text-lg opacity-80">运行时间</h3><p class="text-2xl">${d.uptime}</p></div>
    `;
}
setInterval(update, 3000); update();
</script>
</body>
</html>
