<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Future Asset Market</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #08131d 0%, #0d2330 100%);
        }
        .loading-container {
            text-align: center;
        }
        .spinner {
            border: 12px solid rgba(255, 255, 255, 0.15);
            border-top: 12px solid #2db67c;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            animation: spin 2s linear infinite;
            margin: 0 auto;
        }
        .brand-loading {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 6px;
            max-width: 360px;
            margin: 24px auto 12px;
        }
        .brand-loading span {
            color: #ffffff;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 0.08em;
            animation: pulse 1.4s ease-in-out infinite;
        }
        .brand-loading span:nth-child(2) { animation-delay: 0.05s; }
        .brand-loading span:nth-child(3) { animation-delay: 0.10s; }
        .brand-loading span:nth-child(4) { animation-delay: 0.15s; }
        .brand-loading span:nth-child(5) { animation-delay: 0.20s; }
        .brand-loading span:nth-child(6) { animation-delay: 0.25s; }
        .brand-loading span:nth-child(7) { animation-delay: 0.30s; }
        .brand-loading span:nth-child(8) { animation-delay: 0.35s; }
        .brand-loading span:nth-child(9) { animation-delay: 0.40s; }
        .brand-loading span:nth-child(10) { animation-delay: 0.45s; }
        .brand-loading span:nth-child(11) { animation-delay: 0.50s; }
        .brand-loading span:nth-child(12) { animation-delay: 0.55s; }
        .brand-loading span:nth-child(13) { animation-delay: 0.60s; }
        .brand-loading span:nth-child(14) { animation-delay: 0.65s; }
        .brand-loading span:nth-child(15) { animation-delay: 0.70s; }
        .brand-loading span:nth-child(16) { animation-delay: 0.75s; }
        .brand-loading span:nth-child(17) { animation-delay: 0.80s; }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes pulse {
            0%, 100% {
                opacity: 0.35;
                transform: translateY(0);
            }
            50% {
                opacity: 1;
                transform: translateY(-4px);
            }
        }
        .loading-text {
            margin-top: 10px;
            font-size: 18px;
            color: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
<body>

<div class="loading-container">
    <div class="spinner"></div>
    <div class="brand-loading" aria-label="Future Asset Market loading">
        <span>F</span><span>U</span><span>T</span><span>U</span><span>R</span><span>E</span><span>-</span><span>A</span><span>S</span><span>S</span><span>E</span><span>T</span><br><span>M</span><span>A</span><span>R</span><span>K</span><span>E</span><span>T</span>
    </div>
    <p class="loading-text">Please wait while Future Asset Market loads your dashboard...</p>
</div>

<script>
    setTimeout(function(){
        window.location.href = '/user/dashboard'; // Change '/dashboard' to your actual dashboard route
    }, 3000); // 3000ms = 3 seconds
</script>

</body>
</html>
