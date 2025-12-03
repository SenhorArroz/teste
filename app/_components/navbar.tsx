export default function Navbar() {
    const navLinks = [
        { name: "Quem pode participar?", href: "#" },
        { name: "Inscrições", href: "#" },
        { name: "Imagens", href: "#" },
        { name: "Notícias", href: "#" },
        { name: "Integrantes", href: "#" },
        { name: "Contatos", href: "#" },
    ];

    return (
        <div className="navbar bg-white backdrop-blur-md text-slate-700 shadow-sm border-b border-slate-100 sticky top-0 z-50">

            <div className="navbar-start max-w-[80%] ">
                <a className="flex flex-col lg:flex-row lg:items-center gap-1 lg:gap-3 cursor-pointer select-none hover:opacity-75 transition-opacity duration-200">
                    <span className="text-2xl font-bold text-blue-600 leading-none">
                        ProEIDI
                    </span>

                    <span className="hidden lg:block w-px h-6 bg-slate-300"></span>

                    <span className="text-xs lg:text-lg font-medium text-slate-600 leading-tight">
                        <span className="hidden lg:inline">Projeto de Extensão Inclusão Digital para Idosos</span>
                        <span className="lg:hidden">Extensão Inclusão Digital</span>
                    </span>
                </a>
            </div>

            <div className="navbar-end justify-end hidden lg:flex">
                <ul className="menu menu-horizontal px-1 gap-4">
                    {navLinks.map((link, index) => (
                        <li key={index}>
                            <a
                                href={link.href}
                                className="text-base font-medium text-slate-600 hover:text-blue-600 hover:bg-transparent transition-colors duration-200 p-0 rounded-none relative group"
                            >
                                {link.name}
                                <span className="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-600 transition-all group-hover:w-full"></span>
                            </a>
                        </li>
                    ))}
                </ul>
            </div>

            <div className="navbar-end lg:hidden">
                <div className="dropdown dropdown-end">
                    <div tabIndex={0} role="button" className="btn btn-ghost btn-circle text-slate-600">
                        <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M4 6h16M4 12h16M4 18h7" />
                        </svg>
                    </div>
                    <ul
                        tabIndex={-1}
                        className="menu menu-md dropdown-content bg-white rounded-box z-1 mt-3 w-52 p-2 shadow-xl border border-slate-100">
                        {navLinks.map((link, index) => (
                            <li key={index}>
                                <a href={link.href} className="text-slate-600 hover:text-blue-600">
                                    {link.name}
                                </a>
                            </li>
                        ))}
                    </ul>
                </div>
            </div>
        </div>
    );
}