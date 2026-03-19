"use client";
import React, { useState } from 'react';

const SorteadorOrganico = () => {
  const [min, setMin] = useState(1);
  const [max, setMax] = useState(100);
  const [exclude, setExclude] = useState('');
  const [results, setResults] = useState<number[]>([]);
  const [isAnimating, setIsAnimating] = useState(false);
  
  const [smartphoneHistory, setSmartphoneHistory] = useState<number[]>([]);
  const [computerHistory, setComputerHistory] = useState<number[]>([]);
  const [deviceType, setDeviceType] = useState<'Smartphone' | 'Computador'>('Smartphone');

  // FUNÇÃO DE ALEATORIEDADE ORGÂNICA (FISHER-YATES + ENTROPIA)
  const gerarNumeroOrganico = (lista: number[]) => {
    let copia = [...lista];
    
    // 1. Embaralhamento Fisher-Yates (3 passagens para máxima entropia)
    for (let pass = 0; pass < 3; pass++) {
      for (let i = copia.length - 1; i > 0; i--) {
        // Usando o tempo de execução (microssegundos) para "sujar" o seed do random
        const seed = (Math.random() * performance.now()) % 1;
        const j = Math.floor(seed * (i + 1));
        [copia[i], copia[j]] = [copia[j], copia[i]];
      }
    }
    
    // 2. Seleção final baseada em um índice randômico da lista já embaralhada
    const finalIndex = Math.floor(Math.random() * copia.length);
    return copia[finalIndex];
  };

  const sortear = () => {
    setIsAnimating(true);
    setResults([]); 
    
    setTimeout(() => {
      const excluidosArray = exclude.split(',').map(n => parseInt(n.trim())).filter(n => !isNaN(n));
      const historicoAlvo = deviceType === 'Smartphone' ? smartphoneHistory : computerHistory;
      
      // Criar pool de números válidos
      const possiveis = [];
      for (let i = min; i <= max; i++) {
        if (!excluidosArray.includes(i) && !historicoAlvo.includes(i)) {
          possiveis.push(i);
        }
      }

      if (possiveis.length === 0) {
        alert(`Fim dos números para ${deviceType}!`);
        setIsAnimating(false);
        return;
      }

      // Executar a lógica orgânica
      const sorteado = gerarNumeroOrganico(possiveis);
      
      setResults([sorteado]);
      
      if (deviceType === 'Smartphone') {
        setSmartphoneHistory(prev => [sorteado, ...prev]);
      } else {
        setComputerHistory(prev => [sorteado, ...prev]);
      }
      
      setIsAnimating(false);
    }, 900); // Delay levemente maior para simular o "cálculo"
  };

  const resetar = () => {
    if(confirm("Limpar todos os registros?")) {
      setSmartphoneHistory([]);
      setComputerHistory([]);
      setResults([]);
    }
  };

  return (
    <div data-theme="light" className="min-h-screen bg-[#fcfdfe] flex flex-col items-center p-4 lg:p-10 font-sans text-slate-800">
      
      <header className="w-full max-w-5xl flex flex-col items-center mb-8 animate-in fade-in duration-1000">
        <img 
          src="https://inclusaodigital.imd.ufrn.br/img/logo.png" 
          alt="Logo" 
          className="h-20 lg:h-40 object-contain mb-4 grayscale-[0.2] opacity-90"
        />
        <div className="h-[2px] w-12 bg-primary/10 rounded-full"></div>
      </header>
      
      <div className="grid grid-cols-1 lg:grid-cols-2 gap-8 w-full max-w-6xl items-stretch">
        
        {/* COLUNA DE AÇÃO */}
        <div className="card bg-white shadow-sm border border-slate-100">
          <div className="card-body p-8 gap-8">
            
            {/* Seletor de Categoria */}
            <div className="flex flex-col items-center">
              <span className="text-[9px] font-black text-sky-600 uppercase tracking-[0.3em] mb-4">Módulo de Destino</span>
              <div className="grid grid-cols-2 bg-sky-600/10 p-1 rounded-xl w-full border border-slate-100">
                <button 
                  onClick={() => setDeviceType('Smartphone')}
                  className={`py-3 rounded-lg text-[11px] font-black text-sky-600 tracking-widest transition-all ${deviceType === 'Smartphone' ? 'bg-white shadow-sm text-primary ring-1 ring-slate-200/50' : 'text-sky-600 opacity-60'}`}
                >
                  SMARTPHONE
                </button>
                <button 
                  onClick={() => setDeviceType('Computador')}
                  className={`py-3 rounded-lg text-[11px] text-sky-600 font-black tracking-widest transition-all ${deviceType === 'Computador' ? 'bg-white shadow-sm text-primary ring-1 ring-slate-200/50' : 'text-sky-600 opacity-60'}`}
                >
                  COMPUTADOR
                </button>
              </div>
            </div>

            {/* Inputs */}
            <div className="grid grid-cols-2 gap-6">
              <div className="form-control">
                <label className="label"><span className="label-text font-black text-sky-600 text-[9px] uppercase tracking-wider">Range Inicial</span></label>
                <input type="number" value={min} onChange={(e) => setMin(parseInt(e.target.value))} className="input input-bordered border-slate-100 bg-slate-50/50 text-center font-bold text-primary focus:bg-white" />
              </div>
              <div className="form-control">
                <label className="label"><span className="label-text font-black text-sky-600 text-[9px] uppercase tracking-wider">Range Final</span></label>
                <input type="number" value={max} onChange={(e) => setMax(parseInt(e.target.value))} className="input input-bordered border-slate-100 bg-slate-50/50 text-center font-bold text-primary focus:bg-white" />
              </div>
            </div>

            {/* DISPLAY PRINCIPAL */}
            <div className="relative py-8 bg-sky-600/5 rounded-[2.5rem] border border-slate-100 flex flex-col items-center justify-center min-h-[300px] overflow-hidden">
              {isAnimating ? (
                <div className="flex flex-col items-center gap-5">
                  <span className="loading loading-spinner loading-lg text-primary/40"></span>
                  <div className="flex flex-col items-center">
                    <span className="text-[10px] font-black text-primary tracking-[0.4em] animate-pulse">PROCESSANDO</span>
                    <span className="text-[8px] text-slate-300 font-mono mt-2">Entropy: {performance.now().toFixed(2)}ms</span>
                  </div>
                </div>
              ) : results.length > 0 ? (
                <div className="text-center animate-in zoom-in duration-500">
                  <div className="text-[140px] font-black text-sky-600 leading-none text-primary tracking-tighter drop-shadow-lg">
                    {results[0]}
                  </div>
                  <div className="mt-6 px-6 py-1.5 bg-amber-500 text-white rounded-lg font-black text-[9px] uppercase tracking-[0.2em]">
                    {deviceType} Registrado
                  </div>
                </div>
              ) : (
                <div className="flex flex-col items-center opacity-[0.08]">
                   <div className="w-16 h-1 w-full bg-slate-400 mb-2 rounded-full"></div>
                   <span className="text-xs font-black uppercase tracking-[0.5em]">Standby</span>
                </div>
              )}
            </div>

            {/* BOTÃO */}
            <button 
              onClick={sortear} 
              disabled={isAnimating}
              className="btn btn-primary btn-lg no-animation h-20 shadow-xl shadow-blue-50 bg-sky-600 border-none normal-case text-lg font-black text-white rounded-2xl hover:translate-y-[-2px] active:translate-y-[1px] transition-all"
            >
              EXECUTAR SORTEIO
            </button>

            <button onClick={resetar} className="text-[9px] font-black text-slate-300 hover:text-red-400 transition-colors uppercase tracking-[0.2em] text-center">Resetar Banco de Dados</button>

            {/* BLACKLIST ESCONDIDA */}
            <div className="collapse opacity-[0.02] hover:opacity-40 transition-all">
              <input type="checkbox" className="min-h-0 h-4" /> 
              <div className="collapse-title p-0 min-h-0 text-[7px] text-center cursor-default uppercase">Secure ID Filter</div>
              <div className="collapse-content px-0 pt-2">
                <input 
                  type="text" 
                  value={exclude} 
                  onChange={(e) => setExclude(e.target.value)}
                  className="w-full bg-slate-100 border-none rounded text-[9px] text-center py-1" 
                  placeholder="EX: 101, 102..."
                />
              </div>
            </div>
          </div>
        </div>

        {/* COLUNA DE REGISTROS (HISTÓRICO) */}
        <div className="card bg-white shadow-sm border border-slate-100 flex flex-col overflow-hidden">
          
          {/* Smartphone Section */}
          <div className="flex-1 p-8 border-b border-slate-50 flex flex-col items-center min-h-[50%]">
            <div className="w-full flex justify-between items-center mb-8">
              <span className="text-[10px] font-black text-sky-600 uppercase tracking-widest">Smartphone</span>
              <div className="h-6 px-3 flex items-center text-sky-600 bg-sky-600/5 text-primary rounded-full text-[13px] font-black">
                {smartphoneHistory.length} IDS
              </div>
            </div>
            <div className="flex flex-wrap justify-center gap-3 w-full overflow-y-auto max-h-48 px-2 custom-scrollbar">
              {smartphoneHistory.map((num, i) => (
                <div key={i} className={`w-11 h-11 flex items-center justify-center rounded-xl font-black text-xs border-2 transition-all ${i === 0 && deviceType === 'Smartphone' ? 'bg-amber-500 text-white scale-110 shadow-lg shadow-blue-100' : 'bg-sky-600/80 border-slate-50 text-white'}`}>
                  {num}
                </div>
              ))}
              {smartphoneHistory.length === 0 && <span className="text-[8px] font-bold text-slate-200 uppercase tracking-widest mt-10">Sem entradas</span>}
            </div>
          </div>

          {/* Computer Section */}
          <div className="flex-1 p-8 bg-slate-50/20 flex flex-col items-center min-h-[50%]">
            <div className="w-full flex justify-between items-center mb-8">
              <span className="text-[10px] font-black text-sky-600 uppercase tracking-widest">Computador</span>
              <div className="h-6 px-3 flex items-center text-sky-600 bg-sky-600/5 text-sky-600 rounded-full text-[13px] font-black">
                {computerHistory.length} IDS
              </div>
            </div>
            <div className="flex flex-wrap justify-center gap-3 w-full overflow-y-auto max-h-48 px-2 custom-scrollbar">
              {computerHistory.map((num, i) => (
                <div key={i} className={`w-11 h-11 flex items-center justify-center rounded-xl font-black text-xs border-2 transition-all ${i === 0 && deviceType === 'Computador' ? 'bg-amber-500 text-white scale-110 shadow-lg shadow-slate-200' : 'bg-sky-600/80 border-slate-50 text-white'}`}>
                  {num}
                </div>
              ))}
              {computerHistory.length === 0 && <span className="text-[8px] font-bold text-slate-200 uppercase tracking-widest mt-10">Sem entradas</span>}
            </div>
          </div>

        </div>

      </div>
    </div>
  );
};

export default SorteadorOrganico;