import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom/client';

interface AttendanceProps {
    employee_id: string;
    employee_name: string;
    date: string;
    checkin: string;
    checkout: string;
    total_working_hours: number;
}

// const Attendance: React.FC<AttendanceProps> = ({ employee_id, checkin, checkout, total_working_hours }) => {
//     return (
//         <div className="attendance-item">
//             <div>Name: {employee_id}</div>
//             <div>Checkin: {checkin ? checkin : "N/A"}</div>
//             <div>Checkout: {checkout ? checkout : "N/A"}</div>
//             <div>Total working hours: {total_working_hours}</div>
//         </div>
//     );
// }

interface AttendanceListProps {
}

const AttendanceList: React.FC<AttendanceListProps> = () => {
    const [attendanceData, setAttendanceData] = useState<AttendanceProps[]>([]);
    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {
        setIsLoading(true);
        fetch('http://localhost:8000/api/attendance')
            .then(res => res.json())
            .then(data => {
                setAttendanceData(data.attendance);
                setIsLoading(false);
            })
            .catch(err => console.log(err));
    }, []);

    if (isLoading) {
        return <div className="loading">Loading...</div>
    } else if (attendanceData.length === 0) {
        return <div className="no-data">No attendance data available</div>
    } else {
        return (
            // <div className="attendance-list">
            //     {attendanceData.map((attendance, index) => (
            //         <Attendance key={index} {...attendance} />
            //     ))}
            // </div>

            <table className="attendance-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Checkin</th>
                        <th>Checkout</th>
                        <th>Total working hours</th>
                    </tr>
                </thead>
                <tbody>
                    {attendanceData.map((attendance, index) => (
                        <tr key={index}>
                            <td>{attendance.employee_name}</td>
                            <td>{attendance.date}</td>
                            <td>{attendance.checkin ?? 'N/A'}</td>
                            <td>{attendance.checkout ?? 'N/A'}</td>
                            <td>{attendance.total_working_hours.toFixed(2)}</td>
                        </tr>
                    ))}
                </tbody>
            </table>
        );
    }
}

const root = ReactDOM.createRoot(document.getElementById('app') as HTMLElement);
root.render(<AttendanceList />);
