<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Mensaje de Contacto</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'DM Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; background-color: #f1f5f9; color: #0f172a; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale;">
    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f1f5f9; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px; background-color: #ffffff; border-radius: 24px; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05), 0 4px 6px -4px rgba(0, 0, 0, 0.05);">
                    <!-- Header -->
                    <tr>
                        <td style="background-color: #4f6ef7; padding: 32px; text-align: center;">
                            <h1 style="margin: 0; font-family: 'Syne', sans-serif; font-size: 24px; font-weight: 800; color: #ffffff; letter-spacing: -0.5px;">
                                Code<span style="color: #dde6ff;">Bridge</span>
                            </h1>
                            <p style="margin: 8px 0 0 0; font-size: 14px; color: #dde6ff; font-weight: 500;">Nuevo mensaje desde el formulario de contacto</p>
                        </td>
                    </tr>
                    
                    <!-- Content -->
                    <tr>
                        <td style="padding: 40px 32px;">
                            <p style="margin: 0 0 24px 0; font-size: 16px; line-height: 1.6; color: #334155;">
                                Hola equipo de <strong>CodeBridge</strong>,
                            </p>
                            <p style="margin: 0 0 32px 0; font-size: 16px; line-height: 1.6; color: #334155;">
                                Han recibido una nueva consulta a través del sitio web empresarial. A continuación se detallan los datos enviados por el usuario:
                            </p>

                            <!-- Data Table Card -->
                            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f8fafc; border-radius: 16px; padding: 24px; margin-bottom: 32px;">
                                <tr>
                                    <td style="padding-bottom: 16px; border-bottom: 1px solid #e2e8f0;">
                                        <span style="display: block; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #64748b; margin-bottom: 4px;">Nombre del remitente</span>
                                        <strong style="font-size: 16px; color: #0f172a;">{{ $data['nombre'] }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 16px 0; border-bottom: 1px solid #e2e8f0;">
                                        <span style="display: block; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #64748b; margin-bottom: 4px;">Correo electrónico</span>
                                        <a href="mailto:{{ $data['email'] }}" style="font-size: 16px; color: #4f6ef7; text-decoration: none; font-weight: 600;">{{ $data['email'] }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 16px;">
                                        <span style="display: block; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #64748b; margin-bottom: 4px;">Asunto</span>
                                        <strong style="font-size: 16px; color: #0f172a;">{{ $data['asunto'] }}</strong>
                                    </td>
                                </tr>
                            </table>

                            <!-- Message Content -->
                            <h3 style="margin: 0 0 12px 0; font-size: 14px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; color: #64748b;">Mensaje enviado:</h3>
                            <div style="background-color: #f8fafc; border-left: 4px solid #4f6ef7; border-radius: 4px 12px 12px 4px; padding: 20px; font-size: 15px; line-height: 1.6; color: #334155; white-space: pre-wrap;">{{ $data['mensaje'] }}</div>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="background-color: #f8fafc; padding: 24px 32px; border-top: 1px solid #e2e8f0; text-align: center;">
                            <p style="margin: 0; font-size: 12px; color: #94a3b8; line-height: 1.5;">
                                Este correo fue enviado automáticamente por el sistema de contacto de CodeBridge.<br>
                                © {{ date('Y') }} CodeBridge. Todos los derechos reservados.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
