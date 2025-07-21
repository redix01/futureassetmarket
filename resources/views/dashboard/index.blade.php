@extends('dashboard.layout.app')
@section('content')

<style>
/* Dashboard Styles */
.main-chart-card {
  background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
  border-radius: 16px;
  padding: 24px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
  border: 1px solid rgba(255, 255, 255, 0.1);
  height: 100%;
}

.chart-header {
  margin-bottom: 20px;
}

.chart-title {
  color: #ffffff;
  font-size: 1.5rem;
  font-weight: 600;
  margin: 0;
}

.timeframe-selector {
  display: flex;
  gap: 8px;
}

.timeframe-btn {
  background: rgba(255, 255, 255, 0.1);
  border: 1px solid rgba(255, 255, 255, 0.2);
  color: #6c757d;
  padding: 8px 16px;
  border-radius: 8px;
  font-size: 0.875rem;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
}

.timeframe-btn:hover {
  background: rgba(255, 255, 255, 0.15);
  color: #ffffff;
}

.timeframe-btn.active {
  background: #00d4ff;
  border-color: #00d4ff;
  color: #ffffff;
}

.chart-container {
  position: relative;
  height: 300px;
}

/* Stats Cards - Redesigned for right side */
.stats-cards {
  display: flex;
  flex-direction: column;
  gap: 20px;
  height: 100%;
}

.stat-card {
  border-radius: 16px;
  padding: 24px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
  display: flex;
  align-items: center;
  justify-content: space-between;
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.stat-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.stat-card:hover::before {
  opacity: 1;
}

.stat-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
}

/* Profit Card - Purple to Blue gradient */
.profit-card {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  color: white;
}

/* Stock Card - Bright Green */
.stock-card {
  background: linear-gradient(135deg, #00d4ff 0%, #0099cc 100%);
  color: white;
}

/* Crypto Card - Pink to Red gradient */
.crypto-card {
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  color: white;
}

/* Deposit Card - Blue gradient */
.deposit-card {
  background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
  color: white;
}

/* Withdrawal Card - Green gradient */
.withdrawal-card {
  background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
  color: white;
}

/* Quick Stats Card - Dark Gray */
.quick-stats-card {
  background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
  color: white;
}

.stat-content {
  flex: 1;
  position: relative;
  z-index: 2;
}

.stat-label {
  color: rgba(255, 255, 255, 0.8);
  font-size: 0.875rem;
  font-weight: 500;
  margin-bottom: 8px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

.stat-value {
  color: #ffffff;
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 4px;
  line-height: 1.2;
}

.stat-subtitle {
  color: rgba(255, 255, 255, 0.7);
  font-size: 0.875rem;
  margin: 0;
  font-weight: 400;
}

.stat-icon {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  background: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(10px);
  position: relative;
  z-index: 2;
}

.stat-icon svg {
  color: white;
}

/* Quick Stats Grid */
.quick-stats-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
  margin-top: 12px;
}

.quick-stat-item {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
}

.quick-stat-value {
  color: #ffffff;
  font-size: 1.25rem;
  font-weight: 700;
  margin-bottom: 4px;
}

.quick-stat-label {
  color: rgba(255, 255, 255, 0.7);
  font-size: 0.75rem;
  font-weight: 400;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

/* TradingView Section */
.tradingview-section {
  background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
  border-radius: 16px;
  padding: 24px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
  border: 1px solid rgba(255, 255, 255, 0.1);
}

.section-header {
  margin-bottom: 20px;
}

.section-header h4 {
  color: #ffffff;
  font-weight: 600;
  margin-bottom: 8px;
}

.section-header p {
  margin-bottom: 0;
}

/* Referral Section */
.referral-section {
  background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
  border-radius: 16px;
  padding: 24px;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
  border: 1px solid rgba(255, 255, 255, 0.1);
}

.referral-content {
  margin-top: 16px;
}

.referral-content .form-control {
  background: rgba(255, 255, 255, 0.05);
  border: 1px solid rgba(255, 255, 255, 0.1);
  color: #ffffff;
  border-radius: 8px;
}

.referral-content .form-control:focus {
  background: rgba(255, 255, 255, 0.08);
  border-color: #3ebf81;
  box-shadow: 0 0 0 0.2rem rgba(62, 191, 129, 0.25);
  color: #ffffff;
}

.referral-content .btn {
  border-radius: 8px;
  font-weight: 600;
  display: flex;
  align-items: center;
  gap: 8px;
  transition: all 0.3s ease;
}

.referral-content .btn:hover {
  transform: translateY(-1px);
}

/* Responsive Design */
@media (max-width: 991.98px) {
  .stats-cards {
    margin-top: 20px;
  }
  
  .stat-value {
    font-size: 1.5rem;
  }
  
  .stat-card {
    padding: 16px;
  }
}

@media (max-width: 767.98px) {
  .main-chart-card,
  .tradingview-section,
  .referral-section {
    padding: 16px;
  }
  
  .stat-card {
    padding: 12px;
  }
  
  .stat-icon {
    width: 40px;
    height: 40px;
  }
  
  .stat-value {
    font-size: 1.25rem;
  }
}
</style>

<div class="container-fluid main-content px-2 px-lg-4">
    <div class="row my-4 g-4">
        <!-- Main Chart Area - Left Side -->
        <div class="col-lg-8">
            <div class="main-chart-card">
                <div class="chart-header">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="chart-title">Account Balance Overview</h4>
                        <div class="timeframe-selector">
                            <button class="timeframe-btn" data-timeframe="7D">7D</button>
                            <button class="timeframe-btn" data-timeframe="30D">30D</button>
                            <button class="timeframe-btn active" data-timeframe="90D">90D</button>
                        </div>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="balanceChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <!-- Stats Cards - Right Side -->
        <div class="col-lg-4">
            <div class="stats-cards">
                <!-- Total Profit Card -->
                <div class="stat-card profit-card">
                    <div class="stat-content">
                        <h6 class="stat-label">Total Profit</h6>
                        <h3 class="stat-value">${{ number_format($user->profit, 2) }}</h3>
                        <p class="stat-subtitle">Lifetime earnings</p>
                    </div>
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                        </svg>
                    </div>
                </div>

                <!-- Stock Holdings Card -->
                <div class="stat-card stock-card">
                    <div class="stat-content">
                        <h6 class="stat-label">Stock Holdings</h6>
                        <h3 class="stat-value">${{ number_format($totalCurrentValue, 2) }}</h3>
                        <p class="stat-subtitle">{{ $stocks->count() }} positions</p>
                    </div>
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 3v18h18"/>
                            <path d="M18.7 8l-5.1 5.2-2.8-2.7L7 14.3"/>
                        </svg>
                    </div>
                </div>

                <!-- Crypto Holdings Card -->
                <div class="stat-card crypto-card">
                    <div class="stat-content">
                        <h6 class="stat-label">Crypto Holdings</h6>
                        <h3 class="stat-value">${{ number_format($crypto, 2) }}</h3>
                        <p class="stat-subtitle">Digital assets</p>
                    </div>
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M14.8 9A2 2 0 0 0 13 8h-2a2 2 0 0 0 0 4h2a2 2 0 0 1 0 4h-2a2 2 0 0 1-1.8-1"/>
                            <path d="M12 6v2m0 8v2"/>
                        </svg>
                    </div>
                </div>

                <!-- Deposit Card -->
                <div class="stat-card deposit-card">
                    <div class="stat-content">
                        <h6 class="stat-label">Total Deposits</h6>
                        <h3 class="stat-value">${{ number_format($deposit, 2) }}</h3>
                        <p class="stat-subtitle">Lifetime deposits</p>
                    </div>
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                            <path d="M12 6v2m0 8v2"/>
                        </svg>
                    </div>
                </div>

                <!-- Withdrawal Card -->
                <div class="stat-card withdrawal-card">
                    <div class="stat-content">
                        <h6 class="stat-label">Total Withdrawals</h6>
                        <h3 class="stat-value">${{ number_format($withdrawal, 2) }}</h3>
                        <p class="stat-subtitle">Lifetime withdrawals</p>
                    </div>
                    <div class="stat-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                            <path d="M12 6v2m0 8v2"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TradingView Widget Section -->
    <div class="row my-4">
        <div class="col-12">
            <div class="tradingview-section">
                <div class="section-header">
                    <h4>Market Overview</h4>
                </div>
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright">
                        <a href="https://www.tradingview.com/" rel="noopener nofollow" target="_blank"></a>
                    </div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-stock-heatmap.js" async>
                    {
                        "exchanges": [],
                        "dataSource": "SPX500",
                        "grouping": "sector",
                        "blockSize": "market_cap_basic",
                        "blockColor": "change",
                        "locale": "en",
                        "symbolUrl": "",
                        "colorTheme": "dark",
                        "hasTopBar": false,
                        "isDataSetEnabled": false,
                        "isZoomEnabled": true,
                        "hasSymbolTooltip": true,
                        "isMonoSize": false,
                        "width": "100%",
                        "height": 400
                    }
                    </script>
                </div>
            </div>
        </div>
    </div>

    <!-- Referral Section -->
    <div class="row my-4">
        <div class="col-12">
            <div class="referral-section">
                <div class="section-header">
                    <h4>Referral Program</h4>
                    <p class="text-muted">Share your referral link and earn rewards</p>
                </div>
                <div class="referral-content">
                    <div class="input-group">
                        <input type="text" 
                               value="{{ route('register', ['ref' => auth()->user()->referral->code]) }}" 
                               id="referralLink" 
                               readonly 
                               class="form-control">
                        <button class="btn btn-primary" onclick="copyReferral()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/>
                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                            </svg>
                            Copy Link
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('dashboard.layout.footer')
</div>

<script>
function copyReferral() {
    var copyText = document.getElementById("referralLink");
    copyText.select();
    document.execCommand("copy");
    
    // Show success message
    const button = event.target.closest('button');
    const originalText = button.innerHTML;
    button.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20,6 9,17 4,12"/></svg> Copied!';
    button.classList.add('btn-success');
    button.classList.remove('btn-primary');
    
    setTimeout(() => {
        button.innerHTML = originalText;
        button.classList.remove('btn-success');
        button.classList.add('btn-primary');
    }, 2000);
}

// Timeframe selector functionality
document.addEventListener('DOMContentLoaded', function() {
    const timeframeBtns = document.querySelectorAll('.timeframe-btn');
    let chart;
    
    // Sample data for different timeframes
    const chartDataSets = {
        '7D': {
            labels: ['Jul 15', 'Jul 16', 'Jul 17', 'Jul 18', 'Jul 19', 'Jul 20', 'Jul 21'],
            data: [444000, 442000, 440000, 442000, 444000, 446000, 440000]
        },
        '30D': {
            labels: ['Jun 22', 'Jun 24', 'Jun 26', 'Jun 28', 'Jun 30', 'Jul 2', 'Jul 4', 'Jul 6', 'Jul 8', 'Jul 10', 'Jul 12', 'Jul 14', 'Jul 16', 'Jul 18', 'Jul 20'],
            data: [405000, 410000, 415000, 420000, 425000, 430000, 435000, 440000, 442000, 445000, 442000, 444000, 442000, 444000, 446000]
        },
        '90D': {
            labels: ['Jun 21', 'Jun 22', 'Jun 23', 'Jun 24', 'Jun 25', 'Jun 26', 'Jun 27', 'Jun 28', 'Jun 29', 'Jun 30', 'Jul 1', 'Jul 2', 'Jul 3', 'Jul 4', 'Jul 5', 'Jul 6', 'Jul 7', 'Jul 8', 'Jul 9', 'Jul 10', 'Jul 11', 'Jul 12', 'Jul 13', 'Jul 14', 'Jul 15', 'Jul 16', 'Jul 17', 'Jul 18', 'Jul 19', 'Jul 20', 'Jul 21'],
            data: [402000, 405000, 408000, 410000, 412000, 415000, 418000, 415000, 420000, 422000, 425000, 428000, 430000, 432000, 435000, 438000, 440000, 442000, 441000, 443000, 445000, 442000, 440000, 442000, 444000, 442000, 440000, 442000, 444000, 446000, 440000]
        }
    };
    
    // Chart initialization
    const ctx = document.getElementById('balanceChart').getContext('2d');
    
    // Initial chart data (90D by default)
    const initialData = {
        labels: chartDataSets['90D'].labels,
        datasets: [{
            label: 'Account Balance',
            data: chartDataSets['90D'].data,
            borderColor: '#00d4ff',
            backgroundColor: 'rgba(0, 212, 255, 0.1)',
            borderWidth: 2,
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#00d4ff',
            pointBorderColor: '#fff',
            pointBorderWidth: 2,
            pointRadius: 4,
            pointHoverRadius: 6
        }]
    };

    chart = new Chart(ctx, {
        type: 'line',
        data: initialData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    borderColor: '#00d4ff',
                    borderWidth: 1,
                    cornerRadius: 8,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return 'Account Balance: ' + context.parsed.y.toLocaleString();
                        }
                    }
                }
            },
            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#6c757d',
                        maxRotation: 45,
                        minRotation: 45
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(255, 255, 255, 0.1)'
                    },
                    ticks: {
                        color: '#6c757d',
                        callback: function(value) {
                            return '$' + (value / 1000) + 'k';
                        }
                    }
                }
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        }
    });
    
    // Timeframe button click handlers
    timeframeBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const timeframe = this.dataset.timeframe;
            
            // Remove active class from all buttons
            timeframeBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            // Update chart data
            updateChartData(timeframe);
        });
    });
    
    function updateChartData(timeframe) {
        if (chartDataSets[timeframe]) {
            // Update chart data
            chart.data.labels = chartDataSets[timeframe].labels;
            chart.data.datasets[0].data = chartDataSets[timeframe].data;
            
            // Update chart
            chart.update('active');
            
            console.log('Chart updated for timeframe:', timeframe);
        }
    }
});
</script>

@endsection
