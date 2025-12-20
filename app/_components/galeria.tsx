"use client";
import { useState, useEffect, useRef } from 'react';

export default function Galeria() {
    const [isVisible, setIsVisible] = useState(false);
    const sectionRef = useRef(null);

    useEffect(() => {
        const observer = new IntersectionObserver(
            ([entry]) => {
                if (entry.isIntersecting) {
                    setIsVisible(true);
                    if (sectionRef.current) {
                        observer.unobserve(sectionRef.current);
                    }
                }
            },
            { threshold: 0.1 }
        );

        if (sectionRef.current) {
            observer.observe(sectionRef.current);
        }

        return () => {
            if (sectionRef.current) {
                observer.unobserve(sectionRef.current);
            }
        };
    }, []);

    const galleryImages = [
        { src: "https://inclusaodigital.imd.ufrn.br/img/portfolio/thumbnails/1.jpg", alt: "Atividade em sala de aula" },
        { src: "https://inclusaodigital.imd.ufrn.br/img/portfolio/thumbnails/2.jpg", alt: "Evento no auditório" },
        { src: "https://inclusaodigital.imd.ufrn.br/img/portfolio/thumbnails/3.jpg", alt: "Alunos no computador" },
        { src: "https://inclusaodigital.imd.ufrn.br/img/portfolio/thumbnails/4.jpg", alt: "Laboratório de informática" },
        { src: "https://inclusaodigital.imd.ufrn.br/img/portfolio/thumbnails/5.jpg", alt: "Materiais de estudo" },
        { src: "https://inclusaodigital.imd.ufrn.br/img/portfolio/thumbnails/6.jpg", alt: "Apresentação de projeto" },
        { src: "https://inclusaodigital.imd.ufrn.br/img/portfolio/thumbnails/7.jpg", alt: "Confraternização" },
        { src: "https://inclusaodigital.imd.ufrn.br/img/portfolio/thumbnails/8.jpg", alt: "Aula prática" },
        { src: "https://inclusaodigital.imd.ufrn.br/img/portfolio/thumbnails/12.jpg", alt: "Formatura da turma" },
    ];

    return (
        <section
            ref={sectionRef}
            className="bg-white min-h-fit py-12 px-4 sm:px-6 md:py-24 md:px-8 overflow-hidden flex justify-center"
            id="galeria"
        >
            <div
                className={`
                    max-w-7xl w-full
                    transition-all duration-1000 ease-out transform 
                    ${isVisible
                        ? 'opacity-100 translate-y-0 scale-100'
                        : 'opacity-0 translate-y-24 scale-95'
                    }
                `}
            >
                <h1 className="text-3xl max-w-md mx-auto md:text-4xl font-extrabold text-center text-black border-b-4 border-sky-500 pb-3 mb-8 drop-shadow-md">
                    Galeria de Fotos
                </h1>

                <p className="text-black text-center text-lg mb-12 max-w-2xl mx-auto">
                    Confira alguns momentos das turmas anteriores e eventos do projeto.
                </p>

                <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-2 mb-16">
                    {galleryImages.map((img, index) => (
                        <div
                            key={index}
                            className="card bg-base-100 shadow-xl hover:-translate-y-2 transition-transform duration-300 overflow-hidden"
                        >
                            <figure className="h-64 w-full relative group">
                                <img
                                    src={img.src}
                                    alt={img.alt}
                                    className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                />
                            </figure>
                        </div>
                    ))}
                </div>

            </div>
        </section>
    );
}