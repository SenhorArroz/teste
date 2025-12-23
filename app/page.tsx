import LogoText from "./_components/logo_text";
import Onde from "./_components/onde";
import Participar from "./_components/participar";
import Inscricoes from "./_components/inscricoes";
import Galeria from "./_components/galeria";
import Noticias from "./_components/noticias";

export default function Home() {
  return (
    <main className="min-h-screen w-full bg-white font-sans">
      <LogoText />
      <Onde />
      <Participar />  
      <Inscricoes />
      <Galeria />
      <Noticias />
    </main>
  );
}