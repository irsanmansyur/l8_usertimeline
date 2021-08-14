import React, { useEffect, useState } from "react";

export const DarkMode = () => {
  const [theme, setTheme] = useState(localStorage.theme);
  const changeTheme = () => {
    localStorage.theme = theme === "light" ? "dark" : "light";
    setTheme(theme === "light" ? "dark" : "light");
    location.reload();
  };
  useEffect(() => {
    if (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
      setTheme("dark");
    localStorage.theme = theme;
  }, []);
  return (
    <label htmlFor="dark-light" className="flex flex-col items-center cursor-pointer">
      {/* toggle */}
      <div className="relative">
        {/* input */}
        <input type="checkbox" id="dark-light" checked={theme == "dark" ? true : false} className=" sr-only" onChange={changeTheme} />
        {/* line */}
        <div className="block bg-gray-600 bg-opacity-50 w-14 h-8 rounded-full"></div>
        {/* dot */}
        <div className="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition flex justify-center items-center">
          {
            theme === "dark" ? <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
            </svg> :
              <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
              </svg>
          }
        </div>
      </div>
      {/* label */}

    </label>
  );
};